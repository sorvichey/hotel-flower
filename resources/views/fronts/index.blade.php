@extends('layouts.front')
@section('content')
    <?php $slides = DB::table('slides')->where('active', 1)->orderBy('order')->get(); ?>
    <section class="pb_section" id="section-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mobile-p">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $c = 0; ?>
                    @foreach($slides as $sli)
                    
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$c++}}" ></li>
                   
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php $i = 1;?>
                    @foreach($slides as $sli)
                    @if($i++==1)
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('fronts/slides/'.$sli->photo)}}" alt="First slide">
                    </div>
                    @else
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('fronts/slides/'.$sli->photo)}}" alt="Second slide">
                    </div>
                    @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
        </div>
      </div>
    </section>

    <section class="pb_md_py_cover text-center" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-9  order-md-1">
            <h2 class="heading mb-3" style="color: #ac7951;">{{$welcome->title}}</h2>
            <p class="sub-heading" style="color: #5c3f29;">{!!$welcome->description!!}</p>
          </div>  
        </div>
      </div>
    </section>
    
    <section class="pb_section3 bg-light" id="section-events">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-10 text-center">
            <h2 class="mb-4 text-uppercase pb_letter-spacing-2">THE ESSENCE OF THE RESORT</h2>
          </div>
        </div>
        <div class="row">
          <div class="card-deck">
          @foreach($post as $p)
            <div class="card border-0">
              <a  href="{{url('post/detail/'.$p->id)}}">
              <img class="card-img-top" src="{{url('uploads/posts/small/'.$p->featured_image)}}" alt="">
              </a>
              <div class="card-body pb_p-40">
                <h4 class="card-title text-center"><a href="{{url('post/detail/'.$p->id)}}" class="text-danger">{{$p->title}}</a></h4>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <section class="pb_section3" id="section-events">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-10 text-center">
            <h2 class="mb-4 text-uppercase pb_letter-spacing-2">{{$video->title}}</h2>
          </div>
       
          <iframe width="100%" class="video-youtube" height="720" src="{{$video->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         
      </div>
    </section>
    @endsection