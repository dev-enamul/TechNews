@extends('admin.layout.master')

@section('mainContent')




<div class="content mt-3">
            <div class="animated fadeIn">
     

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{$page_name}}</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                @if(count($errors)>0)
                                <div class="alert alert-warning" role="alert">
                                   @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                   @endforeach
                                </div>

                                @endif
                                
                                  {{ Form::open(array('url'=>['back/setting/edit',$data->id],'method' => 'PUT', 'enctype'=>'multipart/form-data')) }}
                                  
                                    <div class="form-group">
                                        {{Form::label('siteName','Site Name',['class'=>'control-label'])}}
                                        {{Form::text('siteName',$data->system_name,['class'=>'form-control','id'=>'siteName'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('fabIcon','Feb Icon',['class'=>'control-label'])}} <br>
                                        <img src="{{asset('setting')}}/{{$data->fabIcon}}" id="fabIconPreview" style="width: 100px; height: 100px; margin-bottom:10px"  /><br>
                                        <input id="fabIcon" type="file" name="fabIcon" onchange="fabIconFun();" />
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('fontLogo','Font Logo',['class'=>'control-label'])}} <br>
                                        <img src="{{asset('setting')}}/{{$data->fontLogo}}" id="fontLogoPreview" style="width: 100px; height: 100px; margin-bottom:10px"  /><br>
                                        <input id="fontLogo" type="file" name="fontLogo" onchange="fontLogoFun();" />
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('adminLogo','Admin Logo',['class'=>'control-label'])}} <br>
                                        <img src="{{asset('setting')}}/{{$data->adminLogo}}" id="adminLogoPreview" style="width: 100px; height: 100px; margin-bottom:10px"  /><br>
                                        <input id="adminLogo" type="file" name="adminLogo" onchange="adminLogoFun();" />
                                    </div>
                                    
                                     
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Update Setting</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                {{ Form::close() }}
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->
                  </div><!--/.col-->
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->



        <script type="text/javascript">

            function fabIconFun() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("fabIcon").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("fabIconPreview").src = oFREvent.target.result;
                };
            };

            function fontLogoFun() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("fontLogo").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("fontLogoPreview").src = oFREvent.target.result;
                };
            };

            function adminLogoFun() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("adminLogo").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("adminLogoPreview").src = oFREvent.target.result;
                };
            };

            </script>

@endsection