@extends('fontEnd.layout.master')

@section('mainContent')
<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive top_static_article_img" src="{{asset('post'.'/'.$hotNews->main_image)}}"
                             alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Hot News</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{url('details/'.$hotNews->slug)}}" target="_self">{{$hotNews->title}} </a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">{{$hotNews->creator->name}}</a>,<a href="#" target="_self">{{date(' F j -y',strtotime($hotNews->created_at))}}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{$hotNews->short_description}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-comments-o"></i><a href="#">{{count($hotNews->comments)}}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->

            <div class="col-md-5">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" src="{{asset('post').'/'.$popularShareData[0]->thumb_image}}" alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Top Viewed</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{url('details/'.$popularShareData[0]->slug)}}" target="_self">{{$popularShareData[0]->title}} </a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">{{$popularShareData[0]->creator->name}}</a>,<a href="#"
                         target="_self">{{date('F j-y',strtotime($popularShareData[0]->created_at))}}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                        {{\Illuminate\Support\Str::limit($popularShareData[0]->short_description,50)}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-comments-o"></i><a href="#">{{count($popularShareData[0]->comments)}}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->

            <div class="col-md-5">
                <div class="feature_static_last_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" src="{{asset('post').'/'.$popularShareData[1]->thumb_image}}"  alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg blue"><a href="category.html">Top Viewed</a></div>

                        <div class="feature_article_title">
                            <h1><a href="{{url('details/'.$popularShareData[1]->slug)}}" target="_self">{{$popularShareData[1]->title}}</a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">{{$popularShareData[1]->creator->name}}</a>,<a href="#"
                             target="_self">{{date('F j-y',strtotime($popularShareData[1]->created_at))}}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                        {{\Illuminate\Support\Str::limit($popularShareData[1]->short_description,50)}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-comments-o"></i><a href="#">{{count($popularShareData[0]->comments)}}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->

        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<section id="category_section" class="category_section">
<div class="container">
<div class="row">
<div class="col-md-8">

<div class="category_section mobile">
    @foreach($categoryPosts as $categoryPost)
    @if(count($categoryPost->posts) > 0)
    <div class="article_title header_purple">
        <h2><a href="{{url('details/'.$categoryPost->slug)}}" target="_self">{{$categoryPost->name}}</a></h2>
    </div>
    @endif
    <!----article_title------>
    @foreach($categoryPost->posts as $key => $item)
    @if($key>4)
        @break
    @endif
    
    @if($key===0)
    <div class="category_article_wrapper">
        <div class="row">
            <div class="col-md-6 ">
                <div class="top_article_img">
                    <a href="{{url('details/'.$item->slug)}}" target="_self"><img class="img-responsive"
                      src="{{asset('post'.'/'.$item->main_image)}}" alt="feature-top">
                    </a>
                </div>
                <!----top_article_img------>
            </div>
            <div class="col-md-6">
                <span class="tag purple">{{$categoryPost->name}}</span>

                <div class="category_article_title">
                    <h2><a href="{{url('details/'.$item->slug)}}" target="_self">{{$item->title}}</a></h2>
                </div>
                <!----category_article_title------>
                <div class="category_article_date"><a href="#">{{date('F j-y',strtotime($item->created_at))}}</a>, by: <a href="#">{{$item->creator->name}}</a></div>
                <!----category_article_date------>
                <div class="category_article_content">
                   
                    {{\Illuminate\Support\Str::limit($item->short_description,300)}}
                </div>
                <!----category_article_content------>
                <div class="media_social">
                    <span><i class="fa fa-comments-o"></i><a href="#">{{count($item->comments)}}</a> Comments</span>
                </div>
                <!----media_social------>
            </div>
        </div>
    </div>
    @else
    @if($key==0)
    <div class="category_article_wrapper">
        <div class="row">
    @endif
            <div class="col-md-6" style="margin-bottom:10px;" >
                <div class="media">
                    <div class="media-left">
                        <a href="{{url('details/'.$item->slug)}}"><img class="media-object" src="{{asset('post'.'/'.$item->list_image)}}"alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <span class="tag purple">{{$categoryPost->name}}  </span>

                        <h3 class="media-heading"><a href="{{url('details/'.$item->slug)}}" target="_self"> {{\Illuminate\Support\Str::limit($item->title,45)}}</a></h3>
                        <span class="media-date"><a href=" ">{{date('F j-y',strtotime($item->created_at))}}</a>,  by: <a href="#">{{$item->creator->name}}</a></span>

                        <div class="media_social">
                            <span><a href="#"><i class="fa fa-comments-o"></i>{{count($item->comments)}}</a> Comments</span>
                        </div>
                    </div>
                </div>
            </div>
   @if($key===0)
        </div>
    </div>
  @endif
    @endif
    @endforeach
    @if(count($categoryPost->posts) > 0)
    <p class="divider"><a href="{{url('category/'.$categoryPost->id)}}">More News&nbsp;&raquo;</a></p>
    @endif
    @endforeach
</div>
<!-- Mobile News Section -->
 
<!-- Tablet News Section -->
 
 
 
<!-- Design News Section -->
</div>
<!-- Left Section -->

<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Popular News</a></h2>
    </div>
    @foreach($popularShareData as $popularData)
    <div class="media">
        <div class="media-left">
            <a href="{{url('details'.$popularData->slug)}}"><img class="media-object" src="{{asset('post'.'/'.$popularData->list_image)}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{url('details'.$popularData->slug)}}" target="_self">{{$popularData->title}}</a>
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
            <a href="{{url('details/'.$popularData->slug)}}"><img class="media-object" src="{{asset('post').'/'.$mostComment->list_image}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{url('details/'.$popularData->slug)}}" target="_self">{{$mostComment->title}}</a>
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
 
<!-- 
<div class="widget hidden-xs m30">
    <img class="img-responsive add_img" src="{{asset('fontEnd')}}/img/right_add7.jpg" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('fontEnd')}}/img/right_add7.jpg" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('fontEnd')}}/img/right_add7.jpg" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('fontEnd')}}/img/right_add7.jpg" alt="add_one">
</div> -->
<!--Advertisement -->

  
</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>
<!-- Category News Section -->

<section id="video_section" class="video_section">
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MJ-jbFdUPns"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-6 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h5Jni-vy_5M"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wQ5Gj0UB_R8"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UPvJXBI_3V4"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTCtj5Wz6BM"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

            </div>
            <!-- row -->

        </div>
        <!-- well -->

    </div>
    <!-- Container -->

</section>
<!-- Video News Section -->
 
@endsection