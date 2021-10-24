<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $page_name = "Comment List";
        $data = Comment::where('post_id',$id)->with(['post'])->orderBy('id','desc')->get();
        return view('admin.comment.list',compact('page_name','data'));
    }

    public function reply($id){
        $page_name = "Comment Reply";
        return view('admin.comment.reply',compact('id','page_name'));
    }


    public function replyStore(Request $request){
        $comment = new Comment;
        $comment->name = Auth::user()->name;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->status = 1;
        $comment->save();

        return redirect()->route('comment',['id'=>$comment->post_id]);
    }

    public function status($id){
        $comment = Comment::find($id);
        if($comment->status == 1){
            $comment->status =0;
        }else{
            $comment->status =1;
        }
        $comment->save();
        return redirect()->route('comment',['id'=>$comment->post_id])->with('success','Comment Published Success');
    }

    
}
