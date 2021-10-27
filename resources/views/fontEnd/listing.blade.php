@extends('fontEnd.layout.master')

@section('mainContent')
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#"> {{$category->name}} </a></li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
<div class="row">
<div class="col-md-8">
@foreach($posts as $key => $post)

@if($key === 0)
<div class="entity_wrapper">
    <div class="entity_title header_purple">
        <h1><a href="{{url('category/'.$category->id)}}" target="_blank">{{$category->name}}</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{asset('post'.'/'.$post->main_image)}}" alt="feature-top">
    </div>
    <!-- entity_thumb -->

    <div class="entity_title">
        <a href="{{url('details/'.$post->slug)}}" target="_blank"><h3> {{$post->title}} </h3></a>
    </div>
    <!-- entity_title -->

    <div class="entity_meta">
        <a href="#">{{date('F j-y',strtotime($post->created_at))}}</a>, by: <a href="#">{{$post->creator->name}}</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_content">
        {{$post->short_description}}
      
    </div>
    <!-- entity_content -->

    <div class="entity_social">
        <span><i class="fa fa-comments-o"></i>{{count($post->comments)}}<a href="#">Comments</a> </span>
    </div>
    <!-- entity_social -->

</div>

<!-- entity_wrapper -->
<div class="row">
@endif
    @if($key !=0)
    <div class="col-md-6">
        <div class="category_article_body" style="margin-bottom:30px">
            <div class="top_article_img">
                <img class="img-fluid" src="{{asset('post'.'/'.$post->main_image)}}" style="width:100%"  alt="feature-top">
            </div>
            <!-- top_article_img -->

            <div class="category_article_title">
                <h5><a href="{{url('details/'.$post->slug)}}" >{{$post->title}}</a></h5>
            </div>
            <!-- category_article_title -->

            <div class="article_date">
                <a href="#">{{date('F j - y',strtotime($post->created_at))}}</a>, by: <a href="#">{{$post->creator->name}}</a>
            </div>
            <!-- article_date -->

            <div class="category_article_content">
            {{\Illuminate\Support\Str::limit($post->short_description,200)}}
            </div>
            <!-- category_article_content -->

            <div class="article_social">
                <span><i class="fa fa-comments-o"></i><a href="#">{{count($post->comments)}}</a> Comments</span>
            </div>
            <!-- article_social -->

        </div>
        <!-- category_article_body -->

    </div>
    @endif
    <!-- col-md-6 -->

@if($loop->last)
</div>
@endif

 

@endforeach
<!-- row -->

<div style="text-align:center">
    {{$posts->links("pagination::bootstrap-4")}}
</div>
<!-- widget_advertisement -->

<!-- row -->

<!-- navigation -->

</div>
<!-- col-md-8 -->

<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Popular News</a></h2>
    </div>
    @foreach($popularShareData as $popularData)
    <div class="media">
        <div class="media-left">
            <a href="{{url('details/'.$popularData->slug)}}"><img class="media-object" src="{{asset('post'.'/'.$popularData->list_image)}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{url('details/'.$popularData->slug)}}" target="_self">{{$popularData->title}}</a>
            </h3> <span class="media-date"><a href="#">{{date('j F -y',strtotime($popularData->created_at))}}</a>,  by: <a href="#">{{$popularData->creator->name}}</a></span>

            <div class="widget_article_social"> 
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{count($popularData->comments)}}</a> Comments
             </span>
            </div>
        </div>
    </div>

    @endforeach
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<!-- Popular News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive adv_img" src="{{asset('fontEnd')}}/img/right_add1.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="{{asset('fontEnd')}}/img/right_add2.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="{{asset('fontEnd')}}/img/right_add3.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="{{asset('fontEnd')}}/img/right_add4.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('fontEnd')}}/img/right_add5.jpg" alt="add_one">
</div>
<!-- Advertisement -->
 

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('fontEnd')}}/img/right_add6.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Commented</a></h2>
    </div>

    @foreach($mostCommentData as $mostComment)
    <div class="media">
        <div class="media-left">
            <a href="{{url('details/'.$mostComment->slug)}}"><img class="media-object" src="{{asset('post').'/'.$mostComment->list_image}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{url('details/'.$mostComment->slug)}}" target="_self">{{$mostComment->title}}</a>
            </h3>

            <div class="media_social">
                <span><i class="fa fa-comments-o"></i><a href="#">{{count($mostComment->comments)}}</a> Comments</span>
            </div>
        </div>
    </div>
    @endforeach

    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
</div>
<!-- Most Commented News -->
 
</div>
<!-- col-md-4 -->

</div>
<!-- row -->

</div>
 
@endsection