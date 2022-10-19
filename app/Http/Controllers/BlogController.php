<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::get();
        $user = User::where('id',auth()->user()->id)->first();
        $categories = Category::get();
        return view('blog.index' , compact('blogs','categories','user'));
    }
    public function create(){
        $blogs = Blog::get();
        $user = User::where('id',auth()->user()->id)->first();
        $categories = Category::get();
        return view('blog.create' , compact('categories','blogs','user'));
    }
    public function store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'image' => 'required',
            'short_description' => 'required|max:8000',
            'long_description' => 'required'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'blog' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/blog/', $imageName);
        }
        $store = Blog::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author_id' => auth()->user()->id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imageName,
        ]);
        if(!empty($store->id)){
            return redirect()->route('blog.index')->with('success','Blog Added');
        }
        else{
            return redirect()->route('blog.create')->with('error','Something Went Wrong');
        }
    }
    public function edit($id){
        $blog = Blog::where('id',$id)->first();
        $categories = Category::get();
        $user = User::where('id',auth()->user()->id)->first();
        return view('blog.edit',compact('blog','categories','user'));
    }
    public function update(Request $request, $id){
        $request->validate([
        'category_id' => 'required',
        'title' => 'required|max:191',
        // 'image' => 'required',
        'short_description' => 'required',
        'long_description' => 'required',
    ]);
    $imageData = Blog::where('id',$id)->first();
    if($request->file('image')){
        $image = $request->file('image');
        $imageName = 'blogqasim' . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move('upload/blog/', $imageName);
    }
    else{
        $imageName = $imageData->image;
    }


    $update = blog::where('id',$id)->update([
        'category_id' => $request->category_id,
        'title' => $request->title,
        'author_id' => auth()->user()->id,
        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
        'image' => $imageName,
    ]);
    if($update > 0){
        return redirect()->route('blog.index')->with('success','Blog update');
    }
    return redirect()->route('blog.edit')->with('error','something went wrong');
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
