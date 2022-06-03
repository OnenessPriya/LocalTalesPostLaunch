@extends('site.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<style type="text/css">
#mapShow
{
    filter: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="g"><feColorMatrix type="matrix" values="0.3 0.3 0.3 0 0 0.3 0.3 0.3 0 0 0.3 0.3 0.3 0 0 0 0 0 1 0"/></filter></svg>#g');
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);    
    filter: progid:DXImageTransform.Microsoft.BasicImage(grayScale=1);
}
</style>
<section class="breadcumb_wrap">
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
</section><!--Breadcumb-->

<section class="letest-offer">
	<div class="container">
		<div class="row m-0 mt-5 mb-5">
			<div class="col-12 col-md-6 bg-bipblue p-4">
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
					<li>
				</ul>
			</div>
			<div class="col-12 col-md-6 p-0 image-part" style="background:url({{URL::to('/').'/businesses/'}}{{$business->image}});">
				<!-- <a href="javascript:void(0);" class="all_pic shadow-lg">View All 3 Images</a> -->
			</div>
		</div>
		
		<div class="row m-0 mt-4 mb-5">
			<div class="col-md-12 pl-2 pl-md-0 details_left">
				<div class="card position-relative">
					<div class="price-deat">
						<!-- <h1>$ 200<span>Inc. of all taxes<span></h1> -->
					</div>
					@if($businessSaved==1)
					<a href="{!! URL::to('site-delete-user-directory/'.$business->id) !!}" class="btn btn-blue text-center">Remove</a>
					@else
					<a href="{!! URL::to('site-save-user-directory/'.$business->id) !!}" class="btn btn-blue text-center">Save Directory</a>
					@endif
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#deals" role="tab">Service Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#about" role="tab">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photos" role="tab">Contact Details</a>
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
				</div>
			</div>
			<div class="col-md-12 pl-2 pl-md-0 details_left map-top">
				<div id="mapShow" style="width: 100%; height: 400px;"></div>
			</div>
			@if(count($business->deals)>0)
			<div class="col-md-12 pl-2 pl-md-0 details_left map-top">
				<h2 class="main-heading">List of deals with {{$business->business_name}}</h2>
		  		<ul class="search_list_items">
		  			@foreach($business->deals as $key => $deal)
		  			<li class="p-0">
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
							<div class="col-md-8 p-0 title-grid-deal">
								<h4 class="place_title bebasnew">{{$deal->title}}</h4>
								<p class="location"> <i class="fas fa-map-marker-alt"></i> {{$deal->address}}</p>
								<div class="card-border mt-3 mb-2"></div>
							</div>
							<div class="col-md-4 p-0">
								<div class="bg-orange text-center">
									<img src="{{URL::to('/').'/categories/'}}{{$deal->category->image}}" class="pt-2">
           							 <p>{{$deal->category->title}}</p>
								</div>
							</div>
		  					
			  				<p class="history_details">{!!strip_tags(substr($deal->short_description,0,200))!!}...</p>
			  				<a href="{!! URL::to('deal-details/'.$deal->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $deal->title))) !!}"><img src="{{asset('site/images/right-arrow.png')}}"></a>
		  				</div>
		  			</li>
		  			@endforeach
					 
		  		</ul>
			</div>
			@endif
			@if(count($business->events)>0)
			<div class="col-md-12 pl-2 pl-md-0 details_left map-top">
				<h2 class="main-heading">List of events organized by {{$business->business_name}}</h2>
		  		<ul class="search_list_items">
		  			@foreach($business->events as $key => $event)
		  			<li class="p-0">
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
							<div class="col-md-8 p-0 title-grid-event">
								<h4 class="place_title bebasnew">{{$event->title}}</h4>
								<p class="location"> <i class="fas fa-map-marker-alt"></i> {{$event->address}}</p>
								<div class="card-border mt-3 mb-2"></div>
							</div>
							<div class="col-md-4 p-0">
								<div class="bg-orange text-center">
									<img src="{{URL::to('/').'/categories/'}}{{$event->category->image}}" class="pt-2">
           							 <p>{{$event->category->title}}</p>
								</div>
							</div>
		  					
			  				<p class="history_details">{{strip_tags(substr($event->description,0,200))}}...</p>
			  				<a href="{!! URL::to('event-details/'.$event->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $event->title))) !!}"><img src="{{asset('site/images/right-arrow.png')}}"></a>
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
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
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