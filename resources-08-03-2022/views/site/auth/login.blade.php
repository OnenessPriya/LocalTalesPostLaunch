<!DOCTYPE html>
<html lang="en">
<head>
  <title>Local Tales</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('b2b/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('b2b/css/slick.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('b2b/css/slick-theme.css') }}"/>
  <link rel="stylesheet" href="{{ asset('b2b/css/style.css') }}">

</head>
<body ><!-- class="login-body" -->

<!-- Navbar-->
<section class="bg-light d-flex align-items-center" style="min-height: 100vh;">
    <div class="container h-100">
        <div class="card card0 border-0 col-12 col-md-9 m-auto shadow-sm">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <svg viewBox="0 0 170.07874 170.07874"><path d="M142.30524,40.43091,94.76,8.7343a17.52422,17.52422,0,0,0-19.44131,0L27.77383,40.43075a14.53973,14.53973,0,0,0-6.47456,12.09781v58.58023a14.53919,14.53919,0,0,0,14.75719,14.53758,9.98433,9.98433,0,0,1,7.124,3.04112l34.32781,34.30017a4.41236,4.41236,0,0,0,7.53112-3.12127V128.30917a6.4244,6.4244,0,0,0-1.88165-4.54272L61.81938,102.428c-13.06593-13.066-13.76908-34.415-.90316-47.678a33.59717,33.59717,0,0,1,48.24608.0001c12.86607,13.26308,12.16281,34.6123-.90328,47.67838L88.16617,122.52122a1.83168,1.83168,0,0,0-.53649,1.2952h0a1.83168,1.83168,0,0,0,1.83168,1.83168h44.77871a14.5394,14.5394,0,0,0,14.5394-14.5394V52.52809A14.539,14.539,0,0,0,142.30524,40.43091Z" fill="#ff6153"/><path d="M81.24678,76.86024v10.852a1.90907,1.90907,0,0,1-1.90907,1.90908H68.37993a1.90907,1.90907,0,0,1-1.90907-1.90908V79.91219A25.72945,25.72945,0,0,1,68.37038,69.8844a27.36175,27.36175,0,0,1,5.2509-7.84055,1.89662,1.89662,0,0,1,2.54488-.19243l2.53908,1.95325a1.91051,1.91051,0,0,1,.304,2.72619A32.97663,32.97663,0,0,0,76.33967,70.201a14.63124,14.63124,0,0,0-1.20306,2.42282,1.71525,1.71525,0,0,0,1.6008,2.32736h2.6003A1.90907,1.90907,0,0,1,81.24678,76.86024Zm22.3611,0v10.852a1.90907,1.90907,0,0,1-1.90907,1.90908H90.73967a1.90907,1.90907,0,0,1-1.90907-1.90908V79.91219A25.70493,25.70493,0,0,1,90.73149,69.8844a27.34782,27.34782,0,0,1,5.25086-7.841,1.89663,1.89663,0,0,1,2.54468-.19219l2.53882,1.953a1.91051,1.91051,0,0,1,.30369,2.72653A32.92077,32.92077,0,0,0,98.69941,70.201a14.61545,14.61545,0,0,0-1.203,2.42312,1.71528,1.71528,0,0,0,1.60094,2.32706h2.60145A1.90907,1.90907,0,0,1,103.60788,76.86024Z" fill="#ff6153"/></svg>
                </div>
                <div class="col-lg-7 ">
                    <div class="card border-0 px-2 px-md-4 py-3 py-md-5">
                      <form action="{{ route('site.login.post') }}" method="POST" role="form">
                        @if(session()->has('verified'))
                            <div class="alert alert-success">
                                Verified successfully
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @csrf
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm text-dark">Email Address</h6>
                            </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm text-dark">Password</h6>
                            </label> <input type="password" name="password" placeholder="Enter password"> </div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm text-dark">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm text-primary">Forgot Password?</a>
                        </div>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                        <div class="row mb-4 px-3"> <small class="font-weight-bold text-muted">Don't have an account? <a class="text-orange " href="{{ route('site.register') }}">Register</a></small> </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
      
      
</section>
<!--Script-->

<script src="{{ asset('b2b/js/jquery.min.js') }}"></script>
<script src="{{ asset('b2b/js/popper.min.js') }}"></script>
<script src="{{ asset('b2b/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('b2b/js/slick.min.js') }}"></script>
<script src="{{ asset('b2b/js/custom.js') }}"></script>




</body>
</html>