@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Social&nbsp;&nbsp;
                    <a href="{{url('/admin/social')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form 
                    	action="{{url('/admin/social/update')}}" 
                    	class="form-horizontal" 
                    	method="post"
                    	enctype="multipart/form-data"  
                    >
                        {{csrf_field()}}
                        <input type="hidden" value="{{$social->id}}" name="id">
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2 col-sm-2">
                            	URL  <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10 col-sm-8">
                                <input type="text" autofocus name="url" id="url" value="{{$social->url}}" class="form-control">
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="order" class="control-label col-lg-2 col-sm-2">
                            	Order
                            </label>
                            <div class="col-lg-10 col-sm-10">
                                <input type="number" name="order" id="order" value="{{$social->order}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon" class="control-label col-lg-2 col-sm-2">Icon <span class="text-info">(60 x 60)</span> <span class="text-danger">*</span></label>
                            <div class="col-lg-10 col-sm-10">
                                <input type="file" name="icon" id="icon" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-2 col-sm-2"></label>
                            <div class="col-lg-10 col-sm-10">
                                <img src="{{asset($social->icon)}}" width="60" id="img"/>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-10 col-sm-10">
                                <button class="btn btn-primary" type="submit">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 60;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
    
</script>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});
</script> 
@endsection