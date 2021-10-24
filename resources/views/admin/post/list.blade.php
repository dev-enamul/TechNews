@extends('admin.layout.master')



@section('mainContent')
 
 
    <link rel="stylesheet" href="{{asset('admin/assets')}}/css/lib/datatable/dataTables.bootstrap.min.css">
   
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{$page_name}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">{{$page_name}}</a></li>
                            <li class="active">{{$page_name}} List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<div class="content mt-3">

            @if($massage = session('success'))
            <div class="alert alert-success">
             {{$massage}}
            </div>
            @endif
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{$page_name}}</strong>
                            <a href="{{url('back/post/create')}}" class="btn btn-info pull-right">Create</a>
                        </div>
                      <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Si</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Total View</th>
                        <th>Status</th>
                        <th>Hot Post</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $i=>$row)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$row->title}}</td>
                        <td>
                        @if(file_exists(public_path('post/').$row->thumb_image))
                            <img src="{{asset('post')}}/{{$row->thumb_image}}" width="100px">
                        @endif
                        </td>
                        <td>{{$row->creator->name}}</td>
                        <td>{{$row->view_count}}</td>
                        <td>
                            {{Form::open(['url'=>['back/post/status',$row->id],'method'=>'put'])}}
                                @if($row->status==0)  
                                    {{Form::submit('Publish',['class'=>'btn btn-success'])}}
                                @else
                                {{Form::submit('Unpublish',['class'=>'btn btn-danger'])}}
                                @endif
                            {{Form::close()}}
                        </td>

                        <td>
                            {{Form::open(['url'=>['back/post/hot_news',$row->id],'method'=>'put'])}}
                                @if($row->hot_news==0)  
                                    {{Form::submit('Yes',['class'=>'btn btn-success'])}}
                                @else
                                {{Form::submit('No',['class'=>'btn btn-danger'])}}
                                @endif
                            {{Form::close()}}
                        </td>

                        <td ><a style="display:inline" href="{{url('back/post/edit/'.$row->id)}}" class="btn btn-info">Edit</a>
                            {{Form::open(['url'=>['back/post/delete',$row->id],'method'=>'delete','style'=>'display:inline'])}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

                            {{Form::close()}}
                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

   
        
    <script src="{{asset('admin/assets')}}/js/lib/data-table/datatables.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/jszip.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/pdfmake.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/vfs_fonts.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/buttons.print.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


@endsection

