<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title') - {{ config('app.name') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('b2b/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('b2b/css/slick.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('b2b/css/slick-theme.css') }}"/>
  <link rel="stylesheet" href="{{ asset('b2b/css/style.css') }}">
  @yield('styles')
  @stack('styles')
</head>
<body class="bg-lightgray">

<header>
  <nav class="mnb navbar navbar-default fixed-top topnav">
    <div class="container-fluid">
      <div class="navbar-header">
        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <i class="ic fa fa-bars"></i>
        </button> -->
        <div>
           <a href="#" id="msbo" class="menuIcon"><i class="ic fa fa-bars"></i></a>
           <a href="#" class="admin-brand"><img src="{{ asset('b2b/images/logo.png')}}" class="img-fluid"></a>
        </div>
      </div>
      <div id="navbar" class="top-rightmenu">
        <ul class="navbar-nav ml-aoto">
          <li>
            <a href="#"><i class="far fa-bell"></i></a>
            <span class="count-noti">
              50
            </span>
          </li>
          <li><a href="#"><i class="fas fa-cog"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  @include('business.partials.sidebar')
  <div class="mcw">
    <div class="container-fluid">
    @yield('content')
    </div>
  </div>
  </header>

<!--Script-->

<script src="{{ asset('b2b/js/jquery.min.js') }}"></script>

<script src="{{ asset('b2b/js/popper.min.js') }}"></script>
<script src="{{ asset('b2b/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('b2b/js/slick.min.js') }}"></script>
<script src="{{ asset('b2b/js/custom.js') }}"></script>
<script src="{{ asset('b2b/js/ckeditor.js')}}"></script>
<script>
         //CKEDITOR.replace( '#eveDesc' );

        //ClassicEditor.create(document.querySelector('#eveDesc'))
    </script>
@stack('scripts')
</body>
</html>