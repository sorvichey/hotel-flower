<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Flower Garden Cabin</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Flower Garden Cabin was designed in style of a modern beach cabin with three types of room set - Single Room Luxury, double room family and single room">
    <link rel="image_src" href="{{asset('fronts/images/flower-garden-cabin.jpg')}}" width="100%" >
   
    <link rel="icon" href="{{asset('fronts/images/favicon.png')}}">
    <meta name="keywords" content="flower garden cabin, flower garden hotel, flower hotel, hotel flower,hotel in cambodia">
    <meta property="og:title" content="Flower Garden Cabin, Kep, Cambodia, " />
    <meta property="og:description" content="Flower Garden Cabin Located 12 km from Kep Market and 15 km from Crab Market, Flower Garden Cabin provides accommodation situated in Kep." />
    <link href="{{url('fronts/css/font.css')}}" rel="stylesheet">
    <meta property='og:url' content='http://www.flowergardencabin.com/'/>
    <meta property='og:site_name' content='Flower Gerden Cabin'/>
    <meta property='og:type' content='website'/>
    <meta property="og:image" content="{{asset('fronts/images/flower-garden-cabin.jpg')}}" />
    <link rel="stylesheet" href="{{asset('fronts/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fronts/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('fronts/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fronts/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('fronts/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fronts/css/restaurant.css')}}">
  </head>
  <body data-spy="scroll" data-target="#pb-navbar" data-offset="200">
  <div class="probootstrap-loader"></div>
    <!-- END loader -->

    <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
      <div class="container">
        <a class="navbar-brand d-xl-none d-lg-none d-md-block d-sm-block" href="/">
          <img src="{{asset('fronts/images/logo.png')}}" alt="Instant Logo" class="light">
          <img src="{{asset('fronts/images/logo.png')}}" alt="Instant Logo" class="dark">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="probootstrap-navbar">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link " href="{{url('/')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link " href="{{url('promotion')}}">Promotion</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('room')}}">Room</a></li>
            <li class="nav-item logo-center d-xl-block d-lg-block d-md-none d-sm-none d-none">
              <a class="nav-link text-uppercase pb_letter-spacing-2" href="{{url('/')}}">
                <img src="{{asset('fronts/images/logo.png')}}"width="150" alt="Instant Logo" class="light">
              <img src="{{asset('fronts/images/logo.png')}}"  alt="Instant Logo" class="dark">
              </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{url('page/3')}}">Dinning</a></li>
            <li class="nav-item"><a class="nav-link  " href="{{url('page/2')}}">The Spa</a></li>
            <li class="nav-item"><a class="nav-link " href="{{url('page/1')}}">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    
  @yield('content')
    <?php $socials = DB::table('socials')->where('active', 1)->orderBy('order', 'asc')->get();?>
    <footer class="pb_footer" role="contentinfo">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <ul class="list-inline">
                @foreach($socials as $s)
              <li class="list-inline-item"><a href="{{$s->url}}" target="_blank" class="p-2"><img src="{{URL::asset($s->icon)}}" alt=""></a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <a href="#" style="color:#fff;">​​ Meet on social Media</a>
          </div>
        </div>
      </div>
    </footer>

    <!-- loader -->
    <div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#FDA04F"/></svg></div>
    

    <script src="{{asset('fronts/js/jquery.min.js')}}"></script>
    
    <script src="{{asset('fronts/js/popper.min.js')}}"></script>
    <script src="{{asset('fronts/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('fronts/js/slick.min.js')}}"></script>
    <script src="{{asset('fronts/js/jquery.mb.YTPlayer.min.js')}}"></script>

    <script src="{{asset('fronts/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('fronts/js/jquery.easing.1.3.js')}}"></script>
    
    <script src="{{asset('fronts/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('fronts/js/magnific-popup-options.js')}}"></script>
    <script src="{{asset('fronts/js/main.js')}}"></script>
    
  </body>
</html>