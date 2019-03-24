@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Detail Room&nbsp;&nbsp;
                    <a href="{{url('/admin/room')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    <div class="form-group row">
                        <label for="title" class="control-label col-lg-6 col-sm-6">
                            <p class="text-primary">Title</p>
                            <p>{{$room->title}}</p>
                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="control-label col-lg-12 col-sm-12">
                            <p class="text-primary">Description</p>
                            <p>{!!$room->description!!}</p>
                        </label>
                    </div>       
                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> List Page Slide&nbsp;&nbsp;
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
                    action="{{url('/admin/room-slide/save')}}" 
                    class="form-horizontal" 
                    method="post"
                    enctype="multipart/form-data"  
                >
                        {{csrf_field()}}
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <div class="form-group row">
                            <div class="col-lg-2 col-sm-2">
                            Order
                                <input type="number" name="order" id="order" value="1" class="form-control">
                            </div>
                            <div class="col-lg-2 col-sm-2">
                                Image <span class="text-info">(1280 x 500)</span> <span class="text-danger">*</span>
                                <input type="file" class="form-control" name="photo" required id="photo" accept="image/*" onchange="loadFile(event)">
                            </div>
                            <div class="col-lg-2  col-sm-2"><br>
                                <img src="" id="img"/>
                            </div>
                            <div class="col-md-2">
                              <br>
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                    </div>
                <?php $room_slides = DB::table('room_slides')->where('active', 1)->orderBy('id', 'desc')->where('room_id', $room->id)->get(); ?>
               
                <div class="card-block">
                
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                               <th>Image</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @php($i=1)
                            @foreach($room_slides as $sli)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{asset('fronts/slides/'.$sli->photo)}}" width="70"/></td>
                                    <td>{{$sli->order}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{url('/admin/room-slide/edit/'.$sli->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-xs btn-danger" href="{{url('/admin/room-slide/delete/'.$sli->id.'?room_id='.$room->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                   
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
    function loadFile(e){
        var output = document.getElementById('img2');
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