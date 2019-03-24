@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Promotion List&nbsp;&nbsp;
                    <a href="{{url('/admin/promotion/create')}}" class="btn btn-link btn-sm">
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
                            @foreach($promotions as $p)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('/admin/promotion/edit/'.$p->id)}}" title="Detail">{{$p->title}}</a></td>
                                    <td>
                                        <a class="btn btn-xs btn-info"  href="{{url('/admin/promotion/edit/'.$p->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                       <a class="btn btn-xs btn-danger"  href="{{url('/admin/promotion/delete/'.$p->id ."?page=".@$_GET["page"])}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $promotions->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection