@extends('site.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<!-- <style type="text/css">
#mapShow
{
    filter: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="g"><feColorMatrix type="matrix" values="0.3 0.3 0.3 0 0 0.3 0.3 0.3 0 0 0.3 0.3 0.3 0 0 0 0 0 1 0"/></filter></svg>#g');
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
    filter: progid:DXImageTransform.Microsoft.BasicImage(grayScale=1);
}
</style> -->
<!-- <section class="breadcumb_wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="breadcumb_list">
					<li><a href="{!! URL::to('') !!}">Home</a></li>
					<li><img src="{{asset('site/images/down-arrow.png')}}"></li>
					<li><a href="{!! URL::to('directory-list') !!}">Directory List</a></li>
					<li><img src="{{asset('site/images/down-arrow.png')}}"></li>
					<li>Directory Details</li>
				</ul>
			</div>
		</div>
	</div>
</section> -->
<!--Breadcumb-->

<section class="details_banner">
	<figure>
        @if($business->image)
        <img src="{{ URL::to('/') . '/Directory/' }}{{ $business->image }}">
        @else
                                <img src="{{asset('Directory/placeholder-image.png')}}" class="card-img-top" alt="">
                                @endif
	</figure>
	<figcaption>
		<div class="container">
			<div class="details_info">
				<ul class="breadcumb_list">
					<li><a href="{!! URL::to('') !!}">Home</a></li>
					<li>/</li>
					<li><a href="{!! URL::to('directory-list') !!}">Directory List</a></li>
					<li>/</li>
					<li>Directory Details</li>
				</ul>
				<h1 class="details_banner_heading">{{$business->business_name}}</h1>
				@if($businessSaved==1)
				<a href="{!! URL::to('site-delete-user-directory/'.$business->id) !!}" class="btn btn-blue text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Remove</a>
				@else
				<a href="{!! URL::to('site-save-user-directory/'.$business->id) !!}" class="btn btn-blue text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> Save Directory</a>
				@endif
			</div>
			<div class="banner_meta_area">
				<div class="banner_meta_item">
					<figure>
						<img src="{{URL::to('/').'/categories/'}}{{$business->category->image}}">
					</figure>
					<figcaption>
						<h5>Category</h5>
						<p>{{$business->category->title}}</p>
					</figcaption>
				</div>
				<div class="banner_meta_item">
					<figure>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
					</figure>
					<figcaption>
						<h5>Address</h5>
						<p>{{$business->address}}</p>
					</figcaption>
				</div>
				<div class="banner_meta_item">
					<figure>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
					</figure>
					<figcaption>
						<h5>Phone No.</h5>
						<p>{{$business->mobile}}</p>
					</figcaption>
				</div>
				<div class="banner_meta_item">
					<figure>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
					</figure>
					<figcaption>
						<h5>Email Id</h5>
						<p>{{$business->email}}</p>
					</figcaption>
				</div>
			</div>
		</div>
	</figcaption>
</section>

<section class="letest-offer">
	<?php /* ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-6 bg-bipblue p-4">
				<div class="details_block">
					<ul class="detail-evtext">
						<li>
							<p class="w-100 catagoris_ev">
								<span><img src="{{URL::to('/').'/categories/'}}{{$business->category->image}}" class="mr-2"> {{$business->category->title}}</span>

							</p>
							<a href="#"><h1>{{$business->business_name}}</h1></a>
							<h6>Address</h6>
							<p class="text-white">
								Address : {{$business->address}}<br>
								Phone No : {{$business->mobile}} <br>
								Email Id : {{$business->email}}
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-md-6 p-0 image-part" style="background:url({{URL::to('/').'/businesses/'}}{{$business->image}});">
				<!-- <a href="javascript:void(0);" class="all_pic shadow-lg">View All 3 Images</a> -->
			</div>
		</div>
	</div>
	<?php */ ?>
	<div class="container">

		<div class="row">
			<div class="col-md-6 details_left">
				<!-- <div class="card position-relative"> -->
					<!-- <div class="price-deat">
						<h1>$ 200<span>Inc. of all taxes<span></h1>
					</div> -->

					<ul class="nav nav-tabs details_tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#deals" role="tab">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> <span>Service Description</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#about" role="tab"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photos" role="tab"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <span>Contact Details</span></a>
						</li>
					</ul><!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="deals" role="tabpanel">
							{!!$business->service_description!!}

						</div>
						<div class="tab-pane" id="about" role="tabpanel">
							{!!$business->description!!}
						</div>
						<div class="tab-pane" id="photos" role="tabpanel">
							<ul class="deals-contant">
								<li>Address : {{$business->address}}</li><br>
								<li>Website : {{$business->website}}</li><br>
								<li>Email Id : {{$business->email}}</li><br>
								<li>Phone No : {{$business->mobile}}</li>
							</ul>
						</div>
					</div>
					<!-- <div class="mt-4 text-right">
						<a href="javascript:void(0);" class="orange-btm load_btn" id="load-more2">DETAILS</a>
						<a href="javascript:void(0);" class="blue-btn load_btn" id="load-more2">+ Add</a>
					</div> -->
				<!-- </div> -->
			</div>
			<div class="col-md-6 details_left">
				<div class="directory-map">
					<div id="mapShow" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
			@if(count($business->deals)>0)
			<div class="col-md-12 details_left map-top">
				<h2 class="main-heading">List of deals with {{$business->business_name}}</h2>
		  		<ul class="search_list_items grid">
		  			@foreach($business->deals as $key => $deal)
		  			<li>
		  				<div class="location_img_wrap">
		  					@if($deal->image!='')<img src="{{URL::to('/').'/deals/'}}{{$deal->image}}">@endif
		  					<!-- <ul class="rating_coments">
		  						<li>
		  							<img src="images/star.png">
		  							<h5>4.5 <span>(60 reviews)</span></h5>
		  						</li>
		  						<li>
		  							<img src="images/chat.png">
		  							<h5><span>40 Comments</span></h5>
		  						</li>
		  					</ul> -->
		  				</div>
		  				<div class="list_content_wrap grid-deal row m-0">
		  					<div class="location_meta">
								<figure class="bg-orange">
									<img src="{{URL::to('/').'/categories/'}}{{$deal->category->image}}">
								</figure>
								<figcaption>
									<p>{{$deal->category->title}}</p>
									<h4 class="place_title bebasnew">{{$deal->title}}</h4>
								</figcaption>
							</div>


							<!-- <div class="col-md-8 p-0 title-grid-deal">
								<h4 class="place_title bebasnew">{{$deal->title}}</h4>
								<p class="location"> <i class="fas fa-map-marker-alt"></i> {{$deal->address}}</p>
								<div class="card-border mt-3 mb-2"></div>
							</div>
							<div class="col-md-4 p-0">
								<div class="bg-orange text-center">
									<img src="{{URL::to('/').'/categories/'}}{{$deal->category->image}}" class="pt-2">
           							 <p>{{$deal->category->title}}</p>
								</div>
							</div> -->

			  				<p class="history_details">{!!strip_tags(substr($deal->short_description,0,180))!!}...</p>
			  				<a href="{!! URL::to('deal-details/'.$deal->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $deal->title))) !!}" class="location_btn">View Details<img src="{{asset('site/images/right-arrow.png')}}"></a>
		  				</div>
		  			</li>
		  			@endforeach

		  		</ul>
			</div>
			@endif
			@if(count($business->events)>0)
			<div class="col-md-12 details_left map-top">
				<h2 class="main-heading">List of events organized by {{$business->business_name}}</h2>
		  		<ul class="search_list_items grid">
		  			@foreach($business->events as $key => $event)
		  			<li>
		  				<div class="location_img_wrap">
		  					@if($event->image!='')<img src="{{URL::to('/').'/events/'}}{{$event->image}}">@endif
		  					<!-- <ul class="rating_coments">
		  						<li>
		  							<img src="images/star.png">
		  							<h5>4.5 <span>(60 reviews)</span></h5>
		  						</li>
		  						<li>
		  							<img src="images/chat.png">
		  							<h5><span>40 Comments</span></h5>
		  						</li>
		  					</ul> -->
		  				</div>
		  				<div class="list_content_wrap grid-event row m-0">
		  					<div class="location_meta">
								<figure class="bg-orange">
									<img src="{{URL::to('/').'/categories/'}}{{$event->category->image}}">
								</figure>
								<figcaption>
									<p>{{$event->category->title}}</p>
									<h4 class="place_title bebasnew">{{$event->title}}</h4>
								</figcaption>
							</div>
							<!-- <div class="col-md-8 p-0 title-grid-event">
								<h4 class="place_title bebasnew">{{$event->title}}</h4>
								<p class="location"> <i class="fas fa-map-marker-alt"></i> {{$event->address}}</p>
								<div class="card-border mt-3 mb-2"></div>
							</div>
							<div class="col-md-4 p-0">
								<div class="bg-orange text-center">
									<img src="{{URL::to('/').'/categories/'}}{{$event->category->image}}" class="pt-2">
           							 <p>{{$event->category->title}}</p>
								</div>
							</div> -->

			  				<p class="history_details">{{strip_tags(substr($event->description,0,200))}}...</p>
			  				<a href="{!! URL::to('event-details/'.$event->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $event->title))) !!}" class="location_btn">View Details <img src="{{asset('site/images/right-arrow.png')}}"></a>
		  				</div>
		  			</li>
		  			@endforeach

		  		</ul>
			</div>
			@endif
			<!-- <div class="col-md-4 p-0 details_right">
				<div class="card position-relative">
					<div class="card-header text-center border-0 bg-bipblue text-white">
						<h4>Your Bookings</h4>
					</div>
					<div class="card-body p-0">
						<div class="bg-light p-3 text-center">
							<h5>Please add an option <span class="d-block">Your order is empty</span></h5>
						</div>
						<div class="p-3">
							<h4><span>Total</span> : $0</h4>
						</div>
					</div>
					<div class="card-footer border-0 p-0">
						<a href="javascript:void(0);" class="orange-btm load_btn" id="load-more2">BOOK NOW</a>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>
@endsection
@push('scripts')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDPuZ9AcP4PHUBgbUsT6PdCRUUkyczJ66I" type="text/javascript"></script>
<script type="text/javascript">
	@php
	$locations = array();
	$data = array($business->title,floatval($business->lat),floatval($business->lon));
	array_push($locations,$data);
	@endphp
	var locations = <?php echo json_encode($locations); ?>;
	console.log("dealLocations>>"+JSON.stringify(locations));

    console.log(JSON.stringify(locations));

    var map = new google.maps.Map(document.getElementById('mapShow'), {
      zoom: 16,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      "styles": [{
				"featureType": "administrative",
				"elementType": "labels.text.fill",
				"stylers": [{
					"color": "#444444"
				}]
			}, {
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [{
					"color": "#f2f2f2"
				}]
			}, {
				"featureType": "poi",
				"elementType": "all",
				"stylers": [{
					"visibility": "off"
				}]
			}, {
				"featureType": "road",
				"elementType": "all",
				"stylers": [{
					"saturation": -100
				}, {
					"lightness": 45
				}]
			}, {
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [{
					"visibility": "simplified"
				}]
			}, {
				"featureType": "road.arterial",
				"elementType": "labels.icon",
				"stylers": [{
					"visibility": "off"
				}]
			}, {
				"featureType": "transit",
				"elementType": "all",
				"stylers": [{
					"visibility": "off"
				}]
			}, {
				"featureType": "water",
				"elementType": "all",
				"stylers": [{
					"color": "#4f595d"
				}, {
					"visibility": "on"
				}]
			}],

    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    var iconBase = 'http://cp-33.hostgator.tempwebhost.net/~a1627unp/dev/localtales_v2/public/site/images/';

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: iconBase + 'map_icon.png'
      });

      google.maps.deal.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
@endpush
