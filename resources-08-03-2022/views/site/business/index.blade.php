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
					<li>Directory List</li>
				</ul>
			</div>
		</div>
	</div>
</section><!--Breadcumb-->

<section class="search_history_wrap">
	<div class="history_grid_header history_grid_header-mod">
		<div class="container">
			<div class="row">
				<div class="col-12 d-flex flex-column flex-md-row align-items-center justify-content-between">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  	<li class="nav-item" role="presentation">
					    	<a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">
								<i class="fas fa-th-list"></i>
							</a>
					  	</li>
					  	<li class="nav-item" role="presentation">
					    	<a class="nav-link" id="gird-tab" data-toggle="tab" href="#gird" role="tab" aria-controls="gird" aria-selected="false">
								<i class="fas fa-th-large"></i>
							</a>
					  	</li>
					  	<li class="nav-item" role="presentation">
					    	<a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">
								<i class="fas fa-map-marked-alt"></i>
							</a>
					  </li>
					</ul>
					<div class="search_form_wrap">
						<form action="">
							<input type="text" name="pin" placeholder="Seatch  by postcode">
							<button><img src="{{asset('site/images/magnify.png')}}"></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="history_grid_body history_grid_body-mod">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tab-content" id="myTabContent">
					  	<div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
					  		<div class="result_tab_title_wrap">
					  			<h5 class="result_tab_title">{{count($businesses)}} results found in <a href="#">Pin Code : {{$pinCode}}</a></h5>
					  			<p>List of directories near you</p>
					  		</div>
					  		<ul class="search_list_items search_list_items-mod">
					  			@foreach($businesses as $key => $business)
					  			<li>
					  				<div class="location_img_wrap">
					  					@if($business->image!='')<img src="{{URL::to('/').'/businesses/'}}{{$business->image}}">@endif
					  				</div>
					  				<div class="list_content_wrap row m-0">
										<div class="col-md-9 p-0">
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
											<h4 class="place_title bebasnew">{{$business->business_name}}</h4>
											<div class="location_details">
												<p class="location"> <i class="fas fa-map-marker-alt"></i> {{$business->address}}</p>
											</div>
										</div>
					  					<div class="col-md-3 p-0">
											<div class="bg-orange text-center ">
												<img src="{{URL::to('/').'/categories/'}}{{$business->category->image}}" class="pt-2">
                        						<p>{{$business->category->title}}</p>
											  </div>
										</div>
						  				<p class="history_details">{!!strip_tags(substr($business->description,0,200))!!}...</p>
						  				<a href="{!! URL::to('directory-details/'.$business->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $business->business_name))) !!}"><img src="{{asset('site/images/right-arrow.png')}}"></a>
					  				</div>
					  			</li>
					  			@endforeach
					  			
					  		</ul>
					  		<!-- <a href="#" class="orange-btm load_btn">View All</a> -->
					  	</div>
					  	<div class="tab-pane fade" id="gird" role="tabpanel" aria-labelledby="gird-tab">
					  		<div class="result_tab_title_wrap">
					  			<h5 class="result_tab_title">{{count($businesses)}} results found in <a href="#">Pin Code : {{$pinCode}}</a></h5>
					  			<p>List of directories near you</p>
					  		</div>
					  		<ul class="search_list_items">
					  			@foreach($businesses as $key => $business)
					  			<li class="p-0">
					  				<div class="location_img_wrap">
					  					@if($business->image!='')<img src="{{URL::to('/').'/businesses/'}}{{$business->image}}">@endif
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
					  				<div class="list_content_wrap grid-business row m-0">
										<div class="col-md-8 p-0 title-grid-business">
											<h4 class="place_title bebasnew">{{$business->business_name}}</h4>
											<p class="location"> <i class="fas fa-map-marker-alt"></i> {{$business->address}}</p>
											<div class="card-border mt-3 mb-2"></div>
										</div>
										<div class="col-md-4 p-0">
											<div class="bg-orange text-center">
												<img src="{{URL::to('/').'/categories/'}}{{$business->category->image}}" class="pt-2">
                       							 <p>{{$business->category->title}}</p>
											</div>
										</div>
					  					
						  				<p class="history_details">{!!strip_tags(substr($business->description,0,200))!!}...</p>
						  				<a href="{!! URL::to('directory-details/'.$business->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $business->business_name))) !!}"><img src="{{asset('site/images/right-arrow.png')}}"></a>
					  				</div>
					  			</li>
					  			@endforeach
								 
					  		</ul>
					  		<!-- <a href="#" class="orange-btm load_btn">View All</a> -->
					  	</div>
					  	<div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
					  		<div id="mapShow" style="width: 100%; height: 600px;"></div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--Search-list-->
@endsection
@push('scripts')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDPuZ9AcP4PHUBgbUsT6PdCRUUkyczJ66I" type="text/javascript"></script>
<script type="text/javascript">
	@php
	$locations = array();
	foreach($businesses as $business){
		$data = array($business->business_name,floatval($business->lat),floatval($business->lon));
		array_push($locations,$data);
	}
	@endphp
	var locations = <?php echo json_encode($locations); ?>;
	console.log("businessLocations>>"+JSON.stringify(locations));

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
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
@endpush