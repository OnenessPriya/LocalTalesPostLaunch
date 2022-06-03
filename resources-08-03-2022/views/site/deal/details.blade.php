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
					<li><a href="{!! URL::to('deal-list') !!}">Deals</a></li>
					<li><img src="{{asset('site/images/down-arrow.png')}}"></li>
					<li>Deal Details</li>
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
							<span><img src="{{URL::to('/').'/categories/'}}{{$deal->category->image}}" class="mr-2"> {{$deal->category->title}}</span>
							<span class="float-right w-142">
								<small class="d-block">Expires : {{date("d-M-Y",strtotime($deal->expiry_date))}} </small>
								
							</span>
						</p>
						<a href="#"><h1>{{$deal->title}}</h1></a>
						<h6>Address</h6>
						<p class="text-white">
							Address : {{$deal->address}}<br>
							Price : $ {{$deal->price}} <br>
							Promo Code : {{$deal->promo_code}}
						</p>
					<li>
				</ul>
			</div>
			<div class="col-12 col-md-6 p-0 image-part" style="background:url({{URL::to('/').'/deals/'}}{{$deal->image}});">
				<!-- <a href="javascript:void(0);" class="all_pic shadow-lg">View All 3 Images</a> -->
			</div>
		</div>
		
		<div class="row m-0 mt-4 mb-5">
			<div class="col-md-12 pl-2 pl-md-0 details_left">
				<div class="card position-relative">
					<div class="price-deat">
						<!-- <h1>$ 200<span>Inc. of all taxes<span></h1> -->
					</div>
					@if($dealSaved==1)
					<a href="{!! URL::to('site-delete-user-deal/'.$deal->id) !!}" class="btn btn-blue text-center">Remove</a>
					@else
					<a href="{!! URL::to('site-save-user-deal/'.$deal->id) !!}" class="btn btn-blue text-center">Save Deal</a>
					@endif
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#deals" role="tab">Highlight</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#about" role="tab">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photos" role="tab">How To Redeem</a>
						</li>
					</ul><!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="deals" role="tabpanel">
							{!!$deal->short_description!!}
							
						</div>
						<div class="tab-pane" id="about" role="tabpanel">
							{!!$deal->description!!}
						</div>
						<div class="tab-pane" id="photos" role="tabpanel">
							{!!$deal->how_to_redeem!!}
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
	$data = array($deal->title,floatval($deal->lat),floatval($deal->lon));
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