<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\Category;
use DB;
use Image;
use Illuminate\Support\Str;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Post List";
        if(Auth::user()->type ===1 || Auth::user()->hasRole('Editor')){
            $data = Post::with(['creator'])->orderBy('id','desc')->get();
        }else{
            $data = Post::with(['creator'])->where('created_by',Auth::user()->id)->orderBy('id','desc')->get();
        }
        return view('admin.post.list',compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Post List";
        $category = Category::where('type',1)->pluck('name','id');
        return view('admin.post.create',compact('page_name','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'category'=> 'required',
            'short_description'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->status = 1;
        $post->hot_news = 0;
        $post->view_count = 0;
        $post->main_image = '';
        $post->thumb_image = '';
        $post->list_image = '';
        $post->created_by = Auth::id();
    

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $main_image = 'post_main_'.$post->title.''.time().'.'.$extension;
        $thumb_image = 'post_thumb_'.$post->title.''.time().'.'.$extension;
        $list_image = 'post_list_'.$post->title.''.time().'.'.$extension;

        Image::make($file)->resize(6955,832)->save(public_path('/post'.'/'.$main_image));
        Image::make($file)->resize(670,395)->save(public_path('/post'.'/'.$thumb_image));
        Image::make($file)->resize(122,122)->save(public_path('/post'.'/'.$list_image));

        $post->main_image = $main_image;
        $post->thumb_image = $thumb_image;
        $post->list_image = $list_image;
        $post->save();
        return redirect()->route('post')->with('success','Post Added Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Post Edit";
        $data= Post::find($id);
        $category = Category::where('type',1)->pluck('name','id');
        return view('admin.post.edit',compact('page_name','data','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'category'=> 'required',
            'short_description'=> 'required',
            'description'=> 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->category_id = $request->category;
         

        if($request->file('image')){
            @unlink(public_path('/post'.'/'.$post->main_image));
            @unlink(public_path('/post'.'/'.$post->thumb_image));
            @unlink(public_path('/post'.'/'.$post->list_image));

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $main_image = 'post_main_'.$post->title.''.time().'.'.$extension;
            $thumb_image = 'post_thumb_'.$post->title.''.time().'.'.$extension;
            $list_image = 'post_list_'.$post->title.''.time().'.'.$extension;
    
            Image::make($file)->resize(955,832)->save(public_path('/post'.'/'.$main_image));
            Image::make($file)->resize(670,395)->save(public_path('/post'.'/'.$thumb_image));
            Image::make($file)->resize(122,122)->save(public_path('/post'.'/'.$list_image));
    
            $post->main_image = $main_image;
            $post->thumb_image = $thumb_image;
            $post->list_image = $list_image;
        }

        $post->save();
        return redirect()->route('post')->with('success','Post Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->delete()){
            @unlink(public_path('/post'.'/'.$post->main_image));
            @unlink(public_path('/post'.'/'.$post->thumb_image));
            @unlink(public_path('/post'.'/'.$post->list_image));
        };
        return redirect()->route('post')->with('success',$post->title.' Delete Success');
    }

    public function status($id){
        $post = Post::find($id);
        if($post->status == 1){
            $post->status = 0;
        }else{
            $post->status = 1;
        }
        $post->save();

        return redirect()->route('post')->with('success',$post->title.' Update Success');
    }

    public function hot_news($id){
        $post = Post::find($id);
        if($post->hot_news == 1){
            $post->hot_news = 0;
        }else{
            $post->hot_news = 1;
        }
        $post->save();

        return redirect()->route('post')->with('success',$post->title.' Update Success');
    }
}
