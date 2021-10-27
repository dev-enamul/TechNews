<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class detailsController extends Controller
{
    public function index($slug){
        $post = $posts = Post::where('status',1)->where('slug',$slug)->with('comments','creator','category')->first();

        $post->view_count = $post->view_count+1;
        $post->save();

        $comments = Comment::where('post_id',$post->id)->where('status',1)->get();

        $relatedPosts = Post::where('status',1)->where('slug','!=',$slug)->where('category_id',$post->category_id)->with('comments','creator','category')->limit(4)->get();
        return view('fontEnd.details',compact('post','relatedPosts','comments'));
    }
}
