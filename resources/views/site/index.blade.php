@extends('site.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')


<section class="home-banner">
	<div class="container">
		<div class="row align-items-center flex-sm-row-reverse">
			<div class="col-md-6">
				<div class="slider home-banner--slider">
					<figure>
						<img src="{{asset('site/images/home')}}-banner1.jpg">
					</figure>
					<figure>
						<img src="{{asset('site/images/home')}}-banner2.jpg">
					</figure>
				</div>
			</div>
			<div class="col-md-6">
				<h1><small>Discover</small><br/> <span>thousands of</span> <br/>local businesses</h1>
				<form action="{{ route('site.search') }}">
					<ul class="search-list">
						<li class="keyword">
							<input type="text" id="" placeholder="Search by Keyword">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
							</span>
						</li>
						<li class="postcode">
							<input type="text" name="pin" id="" placeholder="Search by Postcode">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
							</span>
						</li>
						<li class="category">
							<select name="category_id">
								<option value="">Search by category</option>
								@foreach($categories as $category)
		                            <option value="{{ $category->id }}">{{ $category->title }}</option>
		                        @endforeach
							</select>
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
							</span>
						</li>
						<li class="button">
							<button type="submit">
								<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> <span>Search</span>
							</button>
						</li>
					</ul>
				</form>
				<ul class="category-list">
					@foreach($categories as $category)
					<li>
						<a href="#">
							<figure><img src="{{URL::to('/').'/categories/'}}{{$category->image}}"></figure>
							{{$category->title}}
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>


<section class="home-about">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>Get the skills you need for a job that is in demand.</h2>
			</div>
			<div class="col-md-6 offset-md-1">
				<h4>Sed mollis suscipit ipsum, in porttitor quam volutpat eu. Sed molestie metus ut odio rutrum tempor. Donec consectetur ornare lacinia. Nam placerat risus vitae dictum porta.</h4>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-md-4">
				<ul class="process-list">
					<li>
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
						</span>
						<h4>Create an Account</h4>
						<p>Sed mollis suscipit ipsum, in porttitor quam volutpat eu.</p>
					</li>
					<li>
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
						</span>
						<h4>Verify Your Details</h4>
						<p>Sed mollis suscipit ipsum, in porttitor quam volutpat eu.</p>
					</li>
					<li>
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
						</span>
						<h4>Advertise your Business</h4>
						<p>Sed mollis suscipit ipsum, in porttitor quam volutpat eu.</p>
					</li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="home-counter">
					<div class="home-counter--item">
						<span>500</span>
						<p>New Visiters Every Week</p>
					</div>
					<div class="home-counter--item">
						<span>600</span>
						<p>Happy customers every year</p>
					</div>
					<div class="home-counter--item">
						<span>78</span>
						<p>New Listing Every Week</p>
					</div>
				</div>
				<div class="slider home-about--slider">
					<figure>
						<img src="{{asset('site/images/home')}}-banner1.jpg">
					</figure>
					<figure>
						<img src="{{asset('site/images/home')}}-banner2.jpg">
					</figure>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="home-directory">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<aside class="directory-bar">
					<div class="flip-box">
						<nav>
							<h5>Latest Directory</h5>
							<h2>View Directories <br/>in your Area</h2>
							<ul>
								<li><a href="#">Health & Fitness</a></li>
								<li><a href="#">Automotive</a></li>
								<li><a href="#">Restaurants</a></li>
								<li><a href="#">Adult</a></li>
							</ul>
							<a href="#">
								See More
								<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
							</a>
						</nav>
					</div>
				</aside>
			</div>
			<div class="col-md-8">
				<content class="directory-slide">
					<div class="slider home-directory--slider">
					    @foreach($businesses as $business)
						<figure>
							<img src="{{URL::to('/').'/businesses/'}}{{$business->image}}">
							<figcaption>
								<h3><a href="{!! URL::to('directory-details/'.$business->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $business->business_name))) !!}">
								{{$business->business_name}}</a></h3>
								<p>{{$business->address}}</p>
								<a href="{!! URL::to('directory-details/'.$business->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $business->business_name))) !!}">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>
							</figcaption>
						</figure>
						@endforeach
						<!--<figure>-->
						<!--	<img src="{{asset('site/images/home')}}-banner2.jpg">-->
						<!--	<figcaption>-->
						<!--		<h3>YOI Indonesian Fusion</h3>-->
						<!--		<p>Thai Town Melbourne Shop 25 Artemis Ln QV Shopping Centre Melbourne 3000</p>-->
						<!--	</figcaption>-->
						<!--</figure>-->
						<!--<figure>-->
						<!--	<img src="{{asset('site/images/home')}}-banner1.jpg">-->
						<!--	<figcaption>-->
						<!--		<h3>Spring Street Grocer</h3>-->
						<!--		<p>Thai Town Melbourne Shop 25 Artemis Ln QV Shopping Centre Melbourne 3000</p>-->
						<!--	</figcaption>-->
						<!--</figure>-->
						<!--<figure>-->
						<!--	<img src="{{asset('site/images/home')}}-banner2.jpg">-->
						<!--	<figcaption>-->
						<!--		<h3>YOI Indonesian Fusion</h3>-->
						<!--		<p>Thai Town Melbourne Shop 25 Artemis Ln QV Shopping Centre Melbourne 3000</p>-->
						<!--	</figcaption>-->
						<!--</figure>-->
					</div>
					<div class="directory-slide-button">
						<button type="button" class="slick-arrow left-arrow">
			                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
		              	</button>
		            	<button type="button" class="slick-arrow right-arrow">
			                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
			            </button>
			        </div>
				</content>
			</div>
		</div>
	</div>
</section>

<section class="home-event">
	<div class="container">
		<div class="row flex-sm-row-reverse align-items-center">
			<div class="col-md-4 offset-md-1">
				<h5>Latest Events</h5>
				<h2>View Event <br/>in your Area</h2>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
				<a href="{!! URL::to('event-list') !!}" class="event-btn">
					View All Event
					<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
				</a>
			</div>
			<div class="col-md-7">
				<content class="event-holder">
				    @foreach($events as $event)
					<div class="event-block">
						<figure>
							<img src="{{URL::to('/').'/events/'}}{{$event->image}}">
							<div class="event-title">
								<h3>{{$event->title}}</h3>
							</div>
							<figcaption>
								<h3><a href="{!! URL::to('event-details/'.$event->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $event->title))) !!}">
								    {{$event->title}}
								</a></h3>
								<p>{{$event->address}}</p>
								<a href="{!! URL::to('event-details/'.$event->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $event->title))) !!}">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>
							</figcaption>
						</figure>
					</div>
					@endforeach
					<!--<div class="event-block">-->
					<!--	<figure>-->
					<!--		<img src="{{asset('site/images/home')}}-banner2.jpg">-->
					<!--		<div class="event-title">-->
					<!--			<h3>Thai Town Melbourne</h3>-->
					<!--		</div>-->
					<!--		<figcaption>-->
					<!--			<h3>Thai Town Melbourne</h3>-->
					<!--			<p>Thai Town Melbourne Shop 25 Artemis Ln QV Shopping Centre Melbourne 3000</p>-->
					<!--		</figcaption>-->
					<!--	</figure>-->
					<!--</div>-->
					<!--<div class="event-block">-->
					<!--	<figure>-->
					<!--		<img src="{{asset('site/images/home')}}-banner1.jpg">-->
					<!--		<div class="event-title">-->
					<!--			<h3>Thai Town Melbourne</h3>-->
					<!--		</div>-->
					<!--		<figcaption>-->
					<!--			<h3>Thai Town Melbourne</h3>-->
					<!--			<p>Thai Town Melbourne Shop 25 Artemis Ln QV Shopping Centre Melbourne 3000</p>-->
					<!--		</figcaption>-->
					<!--	</figure>-->
					<!--</div>-->
				</content>
			</div>
		</div>
	</div>
</section>

<section class="home-deals">
	<div class="container">
		<div class="deals-holder">
			<div class="deals-block">
				<h5>Latest Deals</h5>
				<h2>View Deals <br/>in your Area</h2>
			</div>
			@foreach($deals as $deal)
			<div class="deals-block">
				<div class="deals-thumbs">
					<figure>
						<a href="{!! URL::to('deal-details/'.$deal->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $deal->title))) !!}">
							<img src="{{URL::to('/').'/deals/'}}{{$deal->image}}">
						</a>
					</figure>
					<figcaption>
						<h3>{{$deal->title}}</h3>
						<a href="{!! URL::to('deal-details/'.$deal->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $deal->title))) !!}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
					</figcaption>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="home-loop">
	<div class="container">
		<div class="w-100">
			<h5>Latest Loop</h5>
			<h2>News and Insights</h2>
		</div>
		<div class="loop-holder">
		    @foreach($latestBlogs as $blog)
			<div class="loop-block">
				<figure>
					<a href="#">
						<img src="{{URL::to('/').'/blogs/'}}{{$blog->image}}">
					</a>
				</figure>
				<figcaption>
					<span>{{$blog->category->title}}</span>
					<h3>{{$blog->title}}</h3>
					<a href="{!! URL::to('blog-details/'.$blog->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $blog->title))) !!}">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>
				</figcaption>
			</div>
			@endforeach
			<!--<div class="loop-block">-->
			<!--	<figcaption>-->
			<!--		<span>Food & Beverages</span>-->
			<!--		<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>-->
			<!--		<p>JSON Web Token (JWT) is an open standard that allows two parties to securely send data and information as JSON objects. This information can be verified and trusted because it is digitally signed.</p>-->
			<!--		<a href="#">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>-->
			<!--	</figcaption>-->
			<!--</div>-->
			<!--<div class="loop-block">-->
			<!--	<figure>-->
			<!--		<a href="#">-->
			<!--			<img src="{{asset('site/images/home')}}-banner2.jpg">-->
			<!--		</a>-->
			<!--	</figure>-->
			<!--	<figcaption>-->
			<!--		<span>Automotive</span>-->
			<!--		<a href="#">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>-->
			<!--	</figcaption>-->
			<!--</div>-->
			<!--<div class="loop-block">-->
			<!--	<figcaption>-->
			<!--		<span>Government</span>-->
			<!--		<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>-->
			<!--		<p>JSON Web Token (JWT) is an open standard that allows two parties to securely send data and information as JSON objects. This information can be verified and trusted because it is digitally signed.</p>-->
			<!--		<a href="#">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>-->
			<!--	</figcaption>-->
			<!--</div>-->
			<!--<div class="loop-block">-->
			<!--	<figure>-->
			<!--		<a href="#">-->
			<!--			<img src="{{asset('site/images/home')}}-banner1.jpg">-->
			<!--		</a>-->
			<!--	</figure>-->
			<!--	<figcaption>-->
			<!--		<span>Health & Fitness</span>-->
			<!--		<a href="#">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>-->
			<!--	</figcaption>-->
			<!--</div>-->
		</div>
	</div>
</section>



<section class="home-app">
	<div class="container">
		<div class="row flex-sm-row-reverse align-items-center">
			<div class="col-md-7">
				<img src="{{asset('site/images/mobileApp2x.png')}}" class="img-fluid">
			</div>
			<div class="col-md-5">
				<span class="app-tag">Available for all platforms.</span>
				<h2>Find your nearest local business</h2>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
				<a href="#" class="playstore-btn">
					<span>Play Store<br/>Get it for free</span>
					<img src="{{asset('site/images/play-store.png')}}">
				</a>
			</div>
		</div>
	</div>
</section>



<?php /* ?>

<section class="banner" style="background: url({{asset('site/images/banner')}}-image.jpg) no-repeat center center; background-size:cover;">
	<div class="banner-inner">
		<h1 class="banner-heading bebasnew">Discover thousands of local businesses</h1>
		<div class="search-area">
			<form action="{{ route('site.search') }}">
			<ul class="search-list">
			
				<li class="keyword">
					<input type="text" id="" placeholder="Search by Keyword">
					<span><img src="{{asset('site/images/magnify.png')}}"></span>
				</li>
				<li class="postcode">
					<input type="text" name="pin" id="" placeholder="Search by Postcode">
					<span><img src="{{asset('site/images/place.png')}}"></span>
				</li>
				<li class="category">
					<select name="category_id">
						<option value="">Search by category</option>
						@foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
					</select>
					<span><img src="{{asset('site/images/category.png')}}"></span>
				</li>
				<li class="button">
					<input type="submit" value="Search">
				</li>
			
			</ul>
			</form>
		</div>
	</div>
	<div class="category-place">
		<div class="container">
			<ul class="cat-list">
				@foreach($categories as $category)
				<li>
					<a href="#">
						<figure><img src="{{URL::to('/').'/categories/'}}{{$category->image}}"></figure>
						{{$category->title}}
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</section>
<section class="add-section">
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-md-4 mb-md-0 mb-sm-4 ">
				<h2 class="main-heading">Advertise your Business</h2>
				<p>
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal 
				</p>
				<a href="#" class="text-button">Ad your business here <i class="fas fa-long-arrow-alt-right"></i> </a>
			</div>
			<div class="col-md-6 text-center">
				<img src="{{asset('site/images/mobile-image.png')}}" class="img-fluid">
			</div>
		</div>
	</div>
</section>
<section class="gray-section">
	<div class="container">
		<h2 class="main-heading">View Events in your Area</h2>
		<ul class="event-list">
			@foreach($events as $event)
			<li>
				<div class="inner-box" style="background:url({{URL::to('/').'/events/'}}{{$event->image}}) no-repeat center center; background-size: cover;">
					<div class="caption-area">
						<h3 class="grid-heading"><a href="#">{{$event->title}}</a></h3>
						<a href="{!! URL::to('event-details/'.$event->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $event->title))) !!}" class="events-tag">View Details</a>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		<a href="{!! URL::to('event-list') !!}" class="primery-button orange-btm">More Events</a>
	</div>
</section>
<section class="white-section">
	<div class="container">
		<h2 class="main-heading">Connect with your Community</h2>

		<ul class="community-list">
			<li>
				<div class="inner-box">
					<figure style="background:url('{{asset('site/images/commun')}}ity-bg.jpg') no-repeat center center; background-size: cover;"></figure>
					<figcaption>
						<h4>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</h4>
						<a href="#" class="text-button">View More <i class="fas fa-long-arrow-alt-right"></i> </a>
					</figcaption>
				</div>
			</li>
			<li>
				<div class="inner-box">
					<figure style="background:url('{{asset('site/images/commun')}}ity-bg.jpg') no-repeat center center; background-size: cover;"></figure>
					<figcaption>
						<h4>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</h4>
						<a href="#" class="text-button">View More <i class="fas fa-long-arrow-alt-right"></i> </a>
					</figcaption>
				</div>
			</li>
			<li>
				<div class="inner-box">
					<figure style="background:url('{{asset('site/images/commun')}}ity-bg.jpg') no-repeat center center; background-size: cover;"></figure>
					<figcaption>
						<h4>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</h4>
						<a href="#" class="text-button">View More <i class="fas fa-long-arrow-alt-right"></i> </a>
					</figcaption>
				</div>
			</li>
			<li>
				<div class="inner-box">
					<figure style="background:url('{{asset('site/images/commun')}}ity-bg.jpg') no-repeat center center; background-size: cover;"></figure>
					<figcaption>
						<h4>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</h4>
						<a href="#" class="text-button">View More <i class="fas fa-long-arrow-alt-right"></i> </a>
					</figcaption>
				</div>
			</li>
			<li>
				<div class="inner-box">
					<figure style="background:url('{{asset('site/images/commun')}}ity-bg.jpg') no-repeat center center; background-size: cover;"></figure>
					<figcaption>
						<h4>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</h4>
						<a href="#" class="text-button">View More <i class="fas fa-long-arrow-alt-right"></i> </a>
					</figcaption>
				</div>
			</li>
		</ul>

		<a href="#" class="primery-button orange-btm">More Community</a>


	</div>
</section>
<section class="gray-section">
	<div class="container">
		<h2 class="main-heading">Top rated Local Businesses</h2>

		<ul class="top-list">
			@foreach($businesses as $business)
			<li>
				<div class="inner-box" style="background: url('{{URL::to('/').'/businesses/'}}{{$business->image}}') no-repeat center center; background-size: cover;">
					<div class="grid-content">
						<a href="{!! URL::to('directory-details/'.$business->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $business->business_name))) !!}" class="shop-heading">{{$business->business_name}}</a>
						<a href="{!! URL::to('directory-details/'.$business->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $business->business_name))) !!}" class="place"><span><img src="{{asset('site/images/place-icon.png')}}"></span> {{$business->address}}</a>
						<!-- <hr>
						<ul class="comment-list">
							<li><span><img src="{{asset('site/images/star.png')}}"></span> 4.5 <a href="#" class="review-link">(60 reviews)</a></li>
							<li><span><img src="{{asset('site/images/comment-icon.png')}}"></span> <a href="#" class="comment-link">40 Comments</a></li>
						</ul> -->
					</div>
					<span class="rating"><img src="{{asset('site/images/rating-icon.png')}}"></span>
				</div>
			</li>
			@endforeach
			
		</ul>

	</div>
</section>
<section class="counter-section" style="background: url('{{asset('site/images/counte')}}r-bg.jpg') no-repeat center center; background: cover;">
	<div class="container">
		<ul class="counter-list">
			<li>
				<figure data-count="500">0</figure>
				<figcaption>New Visiters Every Week</figcaption>
			</li>
			<li>
				<figure data-count="600">0</figure>
				<figcaption>Happy customers every year</figcaption>
			</li>
			<li>
				<figure data-count="78">0</figure>
				<figcaption>New Listing Every Week</figcaption>
			</li>
		</ul>
	</div>
</section>
<section class="white-section">
	<div class="container">
		<h2 class="main-heading">View Offers in your Local Area</h2>

		<ul class="offers-list">
			@foreach($deals as $deal)
			<li>
				<div class="inner-box" style="background:url({{URL::to('/').'/deals/'}}{{$deal->image}}) no-repeat center center; background-size: cover;">
					<div class="grid-content">
						<a href="{!! URL::to('deal-details/'.$deal->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $deal->title))) !!}" class="shop-heading">{{$deal->title}}</a>
						<a href="{!! URL::to('deal-details/'.$deal->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $deal->title))) !!}" class="place"><span><img src="{{asset('site/images/place-icon.png')}}"></span> {{$deal->address}}</a>
						<!-- <hr> -->
						<!-- <ul class="comment-list">
							<li><span><img src="{{asset('site/images/star.png')}}"></span> 4.5 <a href="#" class="review-link">(60 reviews)</a></li>
						</ul> -->
					</div>
					
				</div>
			</li>
			@endforeach
			
		</ul>
	</div>
</section>
<section class="gray-section">
	<h2 class="main-heading">Find a local business</h2>
	<ul class="business-list">
		<li>
			<div class="inner-box" style="background: url('{{asset('site/images/c1.jpg')}}') no-repeat center center; background-size: cover;">
				<div class="grid-content">
					<a href="#" class="shop-heading">Accommodation</a>
				</div>
			</div>
		</li>
		<li>
			<div class="inner-box" style="background: url('{{asset('site/images/c2.jpg')}}') no-repeat center center; background-size: cover;">
				<div class="grid-content">
					<a href="#" class="shop-heading">Religion</a>
				</div>
			</div>
		</li>
		<li>
			<div class="inner-box" style="background: url('{{asset('site/images/c3.jpg')}}') no-repeat center center; background-size: cover;">
				<div class="grid-content">
					<a href="#" class="shop-heading">Food & Beverages</a>
				</div>
			</div>
		</li>
		<li>
			<div class="inner-box" style="background: url('{{asset('site/images/c1.jpg')}}') no-repeat center center; background-size: cover;">
				<div class="grid-content">
					<a href="#" class="shop-heading">Accommodation</a>
				</div>
			</div>
		</li>
		<li>
			<div class="inner-box" style="background: url('{{asset('site/images/c2.jpg')}}') no-repeat center center; background-size: cover;">
				<div class="grid-content">
					<a href="#" class="shop-heading">Religion</a>
				</div>
			</div>
		</li>
		<li>
			<div class="inner-box" style="background: url('{{asset('site/images/c3.jpg')}}') no-repeat center center; background-size: cover;">
				<div class="grid-content">
					<a href="#" class="shop-heading">Food & Beverages</a>
				</div>
			</div>
		</li>
	</ul>
</section>

<?php */ ?>

@endsection