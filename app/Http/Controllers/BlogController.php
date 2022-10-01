<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::get();
        $categories = Category::get();
        return view('blog.index' , compact('blogs','categories'));
    }
    public function create(){
        $blogs = Blog::get();
        $categories = Category::get();
        return view('blog.create' , compact('categories','blogs'));
    }
    public function store(Request $request){
        $request->validate([
            'category' => 'required',
            'title' => 'required|max:191:blogs,title',                
            'image' => 'required',
            'short_discription' => 'required|max:8000:blogs,short_discription'                
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'blog' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/blog/', $imageName);
        }
        $store = Blog::create([
            'category' => $request->category,
            'title' => $request->title,
            'author' => auth()->user()->name,
            'short_discription' => $request->short_discription,
            'image' => $imageName,
        ]);
        if(!empty($store->id)){
            return redirect()->route('blog.index')->with('Success' , 'Blog Add');
        }
        else{
            return redirect()->route('blog.create')->with('Error' , 'something went wrong');
        }
    }
    public function edit($id){
        $blog = Blog::where('id',$id)->first();
        $categories = Category::get();
        return view('blog.edit',compact('blog','categories'));
    }
    public function update(Request $request, $id){
        $request->validate([ 
        'category' => 'required|:blogs,category,' .$id,
        'title' => 'required|max:191|unique:blogs,title,' .$id,
        'short_discription' => 'required|max:8000|unique:blogs,short_discription,' .$id,
    ]);
    $imageData = Blog::where('id',$id)->first();
    if($request->file('image')){
        $image = $request->file('image');
        $imageName = 'blog' . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move('upload/blog/', $imageName);
    }
    else{
        $imageName = $imageData->blog;
    }
    $update = blog::where('id',$id)->update([
        'category' => $request->category,
        'title' => $request->title,
        'author' => auth()->user()->id,
        'short_discription' => $request->short_discription,
        'image' => $imageName,
    ]);
    if($update > 0){
        return redirect()->route('blog.index')->with('success','Blog update');
    }
    return redirect()->route('blog.index')->with('error','something went wrong');  
    }
    public function delete($id){
        $blogs = Blog::where('id',$id)->first();
        if(!empty($blogs)){
         $blogs->delete();
         return redirect()->route('blog.index')->with('success','Blog delete');
        }
        return redirect()->route('blog.index')->with('error','record not found');
     }
}