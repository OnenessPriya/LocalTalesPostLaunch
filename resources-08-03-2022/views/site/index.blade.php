@extends('site.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
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
@endsection