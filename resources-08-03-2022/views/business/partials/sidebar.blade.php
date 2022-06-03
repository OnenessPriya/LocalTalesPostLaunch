<!--msb: main sidebar-->
<div class="msb" id="msb">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <div class="brand-wrapper">
          <!-- Brand -->
          <div class="brand-name-wrapper">
            <!-- <div class="user-profile-pic">
              <img src="{{ asset('b2b/images/c2.jpg')}}">
            </div> -->
            <h6>{{Auth::user()->name}} | {{Auth::user()->business_name}}</h6>
            <ul class="left-menuadd">
              <li><i class="fas fa-map-marker-alt"></i> {{Auth::user()->address}}</li>
              <li><i class="fas fa-globe"></i> {{Auth::user()->website}}</li>
              <li><i class="fas fa-phone-alt"></i> {{Auth::user()->mobile}}</li>
            </ul>
            <div class="social-div text-center">
              <ul>
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
              </ul>
              <a href="#" class="pro-edit"><i class="far fa-edit"></i> Edit Profile</a>
            </div>
          </div>

        </div>

      </div>

      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          <li><a href="{{ route('business.event.create') }}"><i class="far fa-calendar-alt"></i>Upload Events</a></li>
          <li><a href="{{ route('business.event.index') }}"><i class="far fa-calendar-alt"></i>Event List</a></li>
          <li><a href="{{ route('business.deal.create') }}"><i class="fa fa-heart"></i> Upload deals</a></li>
          <li><a href="{{ route('business.deal.index') }}"><i class="far fa-thumbs-up"></i>Deal list</a></li>
          <li><a href="{{ route('business.logout') }}" class="logout-bg"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>  
</div>