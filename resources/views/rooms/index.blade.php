@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Room List&nbsp;&nbsp;
                    <a href="{{url('/admin/room/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block" style="padding: 0;">
                    <br>
                    <table class="table tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Featured Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $pagex = @$_GET['page'];
                                if(!$pagex)
                                    $pagex = 1;
                                $i = 18 * ($pagex - 1) + 1;
                                ?>
                            @foreach($rooms as $p)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <img src="{{asset('uploads/rooms/small/'.$p->featured_image)}}" alt="" width="50">
                                    </td>
                                    <td><a href="{{url('/admin/room/view/'.$p->id)}}" title="Detail">{{$p->title}}</a></td>
                                    <td>
                                        <a class="btn btn-xs btn-info"  href="{{url('/admin/room/edit/'.$p->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                       <a class="btn btn-xs btn-danger"  href="{{url('/admin/room/delete/'.$p->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection