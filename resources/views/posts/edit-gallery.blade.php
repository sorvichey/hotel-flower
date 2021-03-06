@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Page Gallery&nbsp;&nbsp;
                    <a href="{{url('/admin/post/view/'.$gallery->post_id)}}" class="btn btn-link btn-sm">Back To List</a>
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
                    	action="{{url('/admin/gallery-post/update')}}" 
                    	class="form-horizontal" 
                    	method="post"
                    	enctype="multipart/form-data"  
                    >
                        {{csrf_field()}}
                        <input type="hidden" value="{{$gallery->post_id}}" name="post_id">
                        <input type="hidden" name="id" id="id" value="{{$gallery->id}}">
                        <div class="form-group row">
                            <label for="order" class="control-label col-lg-2 col-sm-2">
                            	Name <span class="text-danger">*</span></label>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required name="name" value="{{$gallery->name}}" id="order" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="order" class="control-label col-lg-2 col-sm-2">
                            	Order <span class="text-danger">*</span></label>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="number" required name="order" value="{{$gallery->order}}" id="order" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="control-label required col-lg-2 col-sm-2">Image  <span class="text-danger">(1280 x 500)</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="photo" id="photo" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-2 col-sm-2"></label>
                            <div class="col-lg-6 col-sm-8">
                            <img src="{{asset('fronts/slides/'.$gallery->photo)}}" width="150" id="img"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection