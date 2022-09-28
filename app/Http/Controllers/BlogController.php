<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class BlogController extends Controller
{
    public function create(){
        $categories = Category::get();
        return view('blog.create', compact('categories'));
    }
    public function store(Request $request){
        // $request->validate([
        //     'title' => 'required',
        //     'blog' => 'required',
        //     'category_id' => 'required',
        //     'author_id' => 'required',
        //     'content' => 'required',
        //     'image' => 'required',
        //     'status' => 'required',
        // ]);
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'blog.image' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/image/blog', $imageName);
        }
        $store = Blog::create([
            'title' => $request->title,
            'blog' => $request->blog,
            'category_id' => $request->category_id,
            'author_id' => auth()->user()->id,
            'content' => $request->content,
            'image' => $imageName,
            'status' => 1,
        ]);

        if(!empty($store->id)){
            return redirect()->route('blog.create')->with('success','Blog Created');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }    
}
