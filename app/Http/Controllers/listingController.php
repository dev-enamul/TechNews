<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use APp\Models\Category;

class listingController extends Controller
{
    public function index($id){
        $posts = Post::where('status',1)->where('category_id',$id)->with('comments','creator')->orderBy('id','desc')->paginate(9);
        $category = Category::find($id);
        return view('fontEnd.listing',compact('posts','category'));
    }
}
