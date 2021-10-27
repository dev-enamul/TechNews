@extends('fontEnd.layout.master')

@section('mainContent')

<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="entity_wrapper">
    <div class="entity_title">
        <h1><a href="#"> {{$post->title}}</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_meta"><a href="#" target="_self">{{date('F i-y',strtotime($post->created_at))}}</a>, by: <a href="#" target="_self">{{$post->creator->name}}</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-full"></i>
    </div>
    <!-- entity_rating -->

    <div class="entity_social">
        <a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
        <!--Twitter-->
        <a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
        <!--Google +-->
        <a href="#" class="icons-sm inst-ic"><i class="fa fa-google-plus"> </i></a>
        <!--Linkedin-->
        <a href="#" class="icons-sm tmb-ic"><i class="fa fa-ge"> </i></a>
        <!--Pinterest-->
        <a href="#" class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
    </div>
    <!-- entity_social -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{asset('post').'/'.$post->thumb_image}}" alt="feature-top">
    </div>
    <!-- entity_thumb -->

    <div class="entity_content">
        <p><b>{{$post->short_description}}</b> </p>
        <p>
            {!! $post->description !!}
        </p>
 
    </div>
    <!-- entity_content -->

    <div class="entity_footer">
        <!-- entity_tag -->

        <div class="entity_social">
            <span><i class="fa fa-comments-o"></i>{{count($post->comments)}} <a href="#">Comments</a> </span>
        </div>
        <!-- entity_social -->

    </div>
    <!-- entity_footer -->

</div>
<!-- entity_wrapper -->

<div class="related_news">
    <div class="entity_inner__title header_purple">
        <h2><a href="#">Related News</a></h2>
    </div>
    <!-- entity_title -->

    <div class="row">
    @foreach($relatedPosts as $relatedPost)
        <div class="col-md-6">
            <div class="media">
                <div class="media-left">
                    <a href="#"><img class="media-object" src="{{asset('post').'/'.$relatedPost->list_image}}"
                                     alt="Generic placeholder image"></a>
                </div>
                <div class="media-body">
                    <span class="tag purple"><a href="category.html" target="_self">{{$relatedPost->category->name}}</a></span>

                    <h3 class="media-heading"><a href="{{url('details/'.$relatedPost->slug)}}" target="_self">{{$relatedPost->title}}</a></h3>
                    <span class="media-date"><a href="#">{{date('F i-y',strtotime('$relatedPost->created_at'))}}</a>,  by: <a href="#">{{$relatedPost->creator->name}}</a></span>

                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-comments-o"></i>{{count($relatedPost->comments)}}</a> Comments</span>
                    </div>
                </div>
            </div>
        </div>
         @endforeach
    </div>
</div>
<!-- Related news -->

<div class="widget_advertisement">
    <img class="img-responsive" src="{{asset('fontEnd')}}/img/category_advertisement.jpg" alt="feature-top">
</div>
<!--Advertisement-->

<div class="readers_comment">
    <div class="entity_inner__title header_purple">
        <h2>Readers Comment</h2>
    </div>
    <!-- entity_title -->
@foreach($comments as $comment)
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img alt="64x64" class="media-object" data-src="{{asset('fontEnd')}}/img/reader_img3.jpg"
                     src="{{asset('fontEnd')}}/img/reader_img3.jpg" data-holder-rendered="true">
            </a>
        </div>
        <div class="media-body">
            <h2 class="media-heading"><a href="#">{{$comment->name}}</a></h2>
            {{$comment->comment}}
           
        </div>
    </div>
@endforeach
    <!-- media end -->
</div>
<!--Readers Comment-->


 
@auth
<div class="entity_comments">
    <div class="entity_inner__title header_black">
        <h2>Add a Comment</h2>
    </div>
    <!--Entity Title -->

    <div class="entity_comment_from">
    {{ Form::open(array('url'=>'back/comment/reply','method' => 'POST')) }}
      
            <div class="form-group">
                {{Form::text('name',Auth::user()->name,['class'=>'form-control','disabled'])}}
                
            </div>
            <div class="form-group">
            {{Form::text('Email',Auth::user()->email,['class'=>'form-control','disabled'])}}
            </div>
            <div class="form-group comment">
            {{Form::textarea('comment',null,['class'=>'form-control','placeholder'=>'Write your thinking..'])}}
            </div>

            <button type="submit" class="btn btn-submit red">Submit</button>
        {{Form::close()}}
    </div>
    <!--Entity Comments From -->

</div>
@endif
<!--Entity Comments -->

</div>
<!--Left Section-->

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

<!--Advertisement-->
</div>
<!--Right Section-->

</div>
<!-- row -->

</div>
<!-- container -->

</section>
<!-- Entity Section Wrapper -->
 
@endsection