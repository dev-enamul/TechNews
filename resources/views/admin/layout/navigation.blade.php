
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('admin/images')}}/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/images')}}/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{url('/back')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    @permission(['All','Permission List'])
                    <li class="active">
                        <a href="{{url('/back/permission')}}"> <i class="menu-icon fa fa-dashboard"></i>Permission </a>
                    </li>
                    @endif
                    @permission(['All','Role List'])
                    <li class="active">
                        <a href="{{url('/back/role')}}"> <i class="menu-icon fa fa-dashboard"></i>Roles </a>
                    </li>
                    @endif  
                    
                    @permission(['All','Author List'])
                    <li class="active">
                        <a href="{{url('/back/author')}}"> <i class="menu-icon fa fa-dashboard"></i>Author </a>
                    </li>
                    @endif  

                    @permission(['All','Category List'])
                    <li class="active">
                        <a href="{{url('/back/category')}}"> <i class="menu-icon fa fa-dashboard"></i>Category </a>
                    </li>
                    @endif  

                    @permission(['All','Post List'])
                    <li class="active">
                        <a href="{{url('/back/post')}}"> <i class="menu-icon fa fa-dashboard"></i>Post</a>
                    </li>
                    @endif  

                    @permission(['All','System Setting'])
                    <li class="active">
                        <a href="{{url('/back/setting/edit')}}"> <i class="menu-icon fa fa-dashboard"></i>System Setting</a>
                    </li>
                    @endif 
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
