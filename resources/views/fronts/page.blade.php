@extends('layouts.front')
@section('content')
    <?php $slides = DB::table('page_slides')->where('page_id', $page->id)->where('active', 1)->orderBy('order')->get(); ?>

    @if(count($slides) > 0)
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
<br>
</section>
    @endif
    @if(count($slides) <= 0)
    <section class="pb_section_con" id="section-about">
    @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">{{$page->title}}</h2>
                    <p>{!!$page->description!!}</p>
                </div>
            </div>
        </div>
        @if($page->id == 1)
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3298.9165787091038!2d104.28842909053195!3d10.493171716807261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109cdbc45f21301%3A0xc9c28620ba61c722!2sFlower+Garden+Cabin!5e0!3m2!1sen!2skh!4v1552880960981" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        @endif
        @if(count($slides) <= 0)
    </section>
    @endif
    <!-- END section -->
    <?php $gallerys = DB::table('gallerys')->where('page_id', $page->id)->where('active', 1)->orderBy('order')->get(); ?>

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
    @endsection