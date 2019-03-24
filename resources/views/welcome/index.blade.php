@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Post List&nbsp;&nbsp;
                    <a href="{{url('/admin/welcome/create')}}" class="btn btn-link btn-sm">
                        New
                    </a>
                </div>
                <div class="card-block" style="padding: 0;">
                   <br>
                    <table class="table tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Title</th>
                                <th>Description</th>
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
                            @foreach($welcome as $p)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                       {{$p->title}}
                                    </td>
                                    <td>{!!$p->description!!}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info"  href="{{url('/admin/welcome/edit/'.$p->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                       <a class="btn btn-xs btn-danger"  href="{{url('/admin/welcome/delete/'.$p->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection