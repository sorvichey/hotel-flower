@extends('layouts.front')
@section('content')
    <?php $slides = DB::table('post_slides')->where('post_id', $post->id)->where('active', 1)->orderBy('order')->get(); ?>
    <section class="pb_section" id="section-about">
    @if(count($slides) > 0)
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
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
<br>
    @endif
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">{{$post->title}}</h2>
                    <p>{!!$post->description!!}</p>
                </div>
            </div>
        </div>
    
    <?php $gallerys = DB::table('gallery_posts')->where('post_id', $post->id)->where('active', 1)->orderBy('order')->get(); ?>
    @if(count($gallerys) > 0)
    <section id="section-gallery">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card-columns">
            @foreach($gallerys as $gallery)
              <div class="card border-0 mb-4">
                <a href="{{asset('fronts/slides/'.$gallery->photo)}}" title="{{$gallery->name}}" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="{{asset('fronts/slides/'.$gallery->photo)}}" title="{{$gallery->name}}" alt="{{$gallery->name}}">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </section> 
    @endif
</section>
@endsection