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
                            @permission(['Category Create','All'])
                            <a href="{{url('back/category/create')}}" class="btn btn-info pull-right">Create</a>
                            @endpermission
                        </div>
                      <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Si</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $i=>$row)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$row->name}}</td>
                        <td>
                        @permission(['Category Update','All'])

                        {{Form::open(['url'=>['back/category/status',$row->id],'method'=>'put'])}}
                            @if($row->type==0)  
                                {{Form::submit('Publish',['class'=>'btn btn-success'])}}
                            @else
                            {{Form::submit('Unpublish',['class'=>'btn btn-danger'])}}
                            @endif
                          {{Form::close()}}

                          @endpermission
                        </td>
                        

                        <td>
                            @permission(['Category Update','All'])
                                <a style="display:inline" href="{{route('category-edit',$row->id)}}" class="btn btn-info">Edit</a>
                            @endpermission

                            @permission(['Category Delete','All'])
                                {{Form::open(['url'=>['back/category/delete',$row->id],'method'=>'delete','style'=>'display:inline'])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                {{Form::close()}}
                            @endpermission
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

