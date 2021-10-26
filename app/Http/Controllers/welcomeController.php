<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class welcomeController extends Controller
{
    public function index(){
        $hotNews = Post::where('status',1)->where('hot_news',1)->with(['comments','creator'])->orderBy('view_count','desc')->first();

        $categoryPosts = Category::where('type',1)->with(['posts'])->orderBy('id','desc')->get();
        return view('fontEnd.home',compact('hotNews','categoryPosts'));
    }
}
