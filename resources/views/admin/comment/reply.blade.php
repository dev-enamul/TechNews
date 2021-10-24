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
                                  
                                  {{ Form::open(array('url'=>'back/comment/reply','method' => 'POST')) }}
                                  
                                    <div class="form-group">
                                        {{Form::label('comment','Comment',['class'=>'control-label'])}}
                                        {{Form::textarea('comment',null,['class'=>'form-control editor','id'=>'comment'] )}}

                                        {{Form::hidden('post_id',$id)}}
                                    </div>
 
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Reply Now</span>
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



<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  

@endsection