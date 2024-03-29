@extends('admin.layout.master')

@section('mainContent')


<div class="content mt-3">
            <div class="animated fadeIn">
     

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Create Permission</strong>
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
                                  
                                  {{ Form::open(array('url'=>'back/permission/store','method' => 'POST')) }}
                                  
                                    <div class="form-group">
                                        {{Form::label('name','Name',['class'=>'control-label'])}}
                                        {{Form::text('name',null,['class'=>'form-control','id'=>'name'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('display_name','Display Name',['class'=>'control-label'])}}
                                        {{Form::text('display_name',null,['class'=>'form-control','id'=>'display_name'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('description','Description',['class'=>'control-label'])}}
                                        {{Form::textarea('description',null,['class'=>'form-control','id'=>'description'] )}}
                                    </div>

                                    
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Create</span>
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


@endsection