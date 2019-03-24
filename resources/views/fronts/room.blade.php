@extends('layouts.front')
@section('content')
<section class="pb_section_page bg-light" id="section-events">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-10 text-center"><br><br>
            <h2 class="mb-4 text-uppercase pb_letter-spacing-2">ROOMS</h2>
          </div>
        </div>
        <div class="row">
          @foreach($rooms as $p)
          <div class="col-md-4">
            <div class="card border-0">
              <a  href="{{url('room/detail/'.$p->id)}}">
              <img class="card-img-top" src="{{url('uploads/rooms/small/'.$p->featured_image)}}" alt="">
              </a>
              <div class="card-body pb_p-40">
                <h4 class="card-title text-center"><a href="{{url('room/detail/'.$p->id)}}" class="text-danger">{{$p->title}}</a></h4>
              </div>
            </div>
            </div>
            @endforeach
          
        </div>
      </div>
    </section>

   @endsection