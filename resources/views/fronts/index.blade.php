@extends('layouts.front')
@section('content')
    <?php $slides = DB::table('slides')->where('active', 1)->orderBy('order')->get(); ?>
    <section class="pb_section" id="section-about">
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
    </section>

    <section class="pb_md_py_cover text-center" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-9  order-md-1">
            <h2 class="heading mb-3" style="color: #ac7951;">Wellcome to Flower Garden Cabin</h2>
            <p class="sub-heading" style="color: #5c3f29;">The Try Palace Resort & Spa is a charming family owned resort offering a Khmer tranditional peaceful and relaxing atmosphere with excellent services from local staff and facilities. At Try Palace Resort & Spa, we embody the Khmer meaning of hospitality, and we share the spirit with our guests while providing quality and friendly service. This spirit came from the heart, shows in our smiles and is part of our daily life. Weaving together our culture and local lifestyle .

A resort is a place used for relaxation or recreation, attracting visitors for vacations, tourism and/or going swimming in a pool. Resorts are places, towns or sometimes commercial establishment operated by a single company.</p>
          </div>  
        </div>
      </div>
    </section>
    <!-- END section -->

    <!-- <section class="pb_section" id="section-gallery">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-10 text-center">
            <h2 class="mb-4 text-uppercase pb_letter-spacing-2">Gallery</h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card-columns">
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/800x975/img_1.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/800x975/img_1.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/800x975/img_1.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/800x975/img_1.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/1900x1200/img_1.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/1900x1200/img_1.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/800x975/img_2.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/800x975/img_2.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/1900x1200/img_1.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/1900x1200/img_1.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/800x975/img_1.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/800x975/img_1.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/800x975/img_1.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/800x975/img_1.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/800x975/img_2.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/800x975/img_2.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
              <div class="card border-0 mb-4">
                <a href="assets/images/restaurant/1900x1200/img_1.jpg" class="pb_hover-zoom image-popup">
                  <img class="img-fluid" src="assets/images/restaurant/1900x1200/img_1.jpg" alt="Image caption here">
                  <i class="ion-ios-search-strong icon"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- END section -->
    <section class="pb_section2 bg-light" id="section-events">
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
              <img class="card-img-top" src="{{url('uploads/posts/small/'.$p->featured_image)}}" alt="">
              <div class="card-body pb_p-40">
                <h4 class="card-title text-center"><a href="#" class="text-danger">{{$p->title}}</a></h4>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <!-- <section class="pb_section pt-0 pb-0" id="section-contact">
      <div class="d-flex">
        <div class="pb_half py-5">
          <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center">
              <h2 class="mb-4 text-uppercase pb_letter-spacing-2">Write us</h2>
            </div>
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-7">
              <form action="#">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control p-3 rounded-0" id="name">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control p-3 rounded-0" id="email">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea cols="30" rows="10" class="form-control  p-3 rounded-0" id="message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn pb_outline-dark pb_font-13 pb_letter-spacing-2  p-3 rounded-0" value="Send Message">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </section> -->
    <!-- END section -->
    @endsection