<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class);
    }
    public function categoryCount($id){
        $blogs  = Blog::where('category_id',$id)->count();
        return $blogs;
    }
}
