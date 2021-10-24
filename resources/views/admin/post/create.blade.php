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
                                  
                                  {{ Form::open(array('url'=>'back/post/store','method' => 'POST','enctype'=>'multipart/form-data')) }}
                                  
                                    <div class="form-group">
                                        {{Form::label('title','Title',['class'=>'control-label'])}}
                                        {{Form::text('title',null,['class'=>'form-control','id'=>'title'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('category','Category',['class'=>'control-label'])}}
                                        {{Form::select('category',$category,NULL,['class'=>'form-control'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('short_description','Short Description',['class'=>'control-label'])}}
                                        {{Form::textarea('short_description',null,['class'=>'form-control','id'=>'short_description'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('description','Description',['class'=>'control-label'])}}
                                        {{Form::textarea('description',null,['class'=>'form-control editor','id'=>'editor'] )}}
                                    </div>

                                    <div class="form-group">
                                        {{Form::label('image','Image',['class'=>'control-label'])}}
                                        <img id="uploadPreview" style="width: 100px; height: 100px; margin-bottom:10px; display:none" />
                                        <input id="uploadImage" type="file" class="form-control" name="image" onchange="PreviewImage();" />
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



<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
            document.getElementById("uploadPreview").style.display ='block';
        };
    };

</script>

@endsection