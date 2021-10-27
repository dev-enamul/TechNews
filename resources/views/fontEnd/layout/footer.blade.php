
<section id="footer_section" class="footer_section">
    <div class="container">
        <hr class="footer-top">
        <div class="row">
            <div class="col-md-3">
                <div class="footer_widget_title"><h3><a href="category.html" target="_self">About Tech</a></h3></div>
                <div class="logo footer-logo">
                    <a title="fontanero" href="index.html">
                        <img src="{{asset('setting').'/'.$settingShareData->fontLogo}}" alt="technews">
                    </a>

                    <p>Competently conceptualize go forward testing procedures and B2B expertise. Phosfluorescently
                        cultivate principle-centered methods.of empowerment through fully researched.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="category.html" target="_self">Discover</a></h3>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    <ul class="list-unstyled left">
                            @foreach($categoryShareData as $category)
                            <li><a href="{{url('category').'/'.$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="#" target="_self">Editor Picks</a></h3>
                </div>
                @foreach($popularShareData as $key => $popular)
                @if($key>1)
                    @break
                @endif
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{asset('post').'/'.$popular->list_image}}"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="{{url('details').'/'.$popular->slug}}">{{$popular->title}}</a>
                        </h3> 
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="category.html" target="_self">Tech Photos</a></h3>
                </div>
                <div class="widget_photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo1.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo2.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo3.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo4.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo5.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo6.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo7.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo8.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo9.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo10.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo11.jpg" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('fontEnd')}}/img/tech_photo12.jpg" alt="Tech Photos">
                </div>

            </div>
        </div>
    </div>

    <div class="footer_bottom_Section">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <div class="col-sm-3">
                        <div class="social">
                            <a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic"><i class="fa fa-tumblr"> </i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>&copy; Copyright 2021-Enamul-Soft Design by: <a href="https://www.facebook.com/proenamul">Md Enamul Haque</a> </p>
                    </div>
                    <div class="col-sm-3">
                        <p>Technology News Magazine</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>