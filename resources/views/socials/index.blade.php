@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Social List&nbsp;&nbsp;
                        <a href="{{url('/admin/social/create')}}" class="btn btn-link btn-sm">
                             New
                        </a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Icon</th>
                                <th>URL</th>
                                <th>Order &numero;</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>
                            @foreach($socials as $sli)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::asset($sli->icon)}}" width="60"/></td>
                                    <td>{{$sli->url}}</td>
                                    <td>{{$sli->order}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary"  href="{{url('/admin/social/edit/'.$sli->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-xs btn-danger"  href="{{url('/admin/social/delete/'.$sli->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection