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

<style>
    .pagination {
        float: right;
    }
</style>

<section class="inner_banner" style="background: url({{asset('site/images/banner')}}-image.jpg) no-repeat center center; background-size:cover;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<h1>Local Directory</h1>
			</div>
			<div class="col-12 col-lg-12 col-xl-10 mt-4">
				<div class="page-search-block">
					<div class="row align-items-center justify-content-between">
						<!--<div class="col-sm-auto">
							{{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="gird-tab" data-toggle="tab" href="#gird" role="tab" aria-controls="gird" aria-selected="false">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
									</a>
							</li>
							</ul> --}}
						</div>-->
						<div class="col">
							<div class="search_form_wrap">
								<form action="">
									<input type="text" name="address" placeholder="Seatch  by postcode">
									<button><img src="{{asset('site/images/magnify.png')}}"></button>
								</form>
							</div>
						</div>
						<div class="col-sm-auto">
							<ul class="breadcumb_list">
								<li><a href="{!! URL::to('') !!}">Home</a></li>
								<li>/</li>
								<li>Directory List</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!--Search-list-->

<section class="pb-4 pb-lg-5 bg-light">
    <h3> Directory </h3>
    <div class="container">
        <div class="mb-4 mb-lg-5 best_deal page-title">
			
        </div>

    <div class="row m-0">

            <div class="col-md-12">
                <div class="row Bestdeals">
                    
                    {{-- <div class="swiper-wrapper"> --}}
                   	@foreach($businesses as $key => $directory)
                    {{-- dd{{ $dir}} --}}
                        <div class="col-md-4 mb-4 mb-lg-0">
                            <div class="card directoryCard border-0">
                                <div class="bst_dimg">
                                    @if(!$directory->image)
                                    <img src="{{URL::to('/').'/Directory/'}}{{$directory->image}}" class="card-img-top" alt="">
                                    @else
                                    <img src="{{asset('Directory/placeholder-image.png')}}" class="card-img-top" alt="">
                                    @endif

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title m-0"><a href="{!! URL::to('directory-details/'.$directory->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $directory->name))) !!}" class="location_btn">{{ $directory->name }}</a></h5>
                                    <p>{!! $directory->address !!}</p>

                                    {{-- <a href="#">Read More...</a> --}}

                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- </div> --}}
                    {{-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> --}}
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            {{ $dir->links() }}
        </div>

        {{-- <div class="swiper top_dect">
            <div class="swiper-wrapper">
                @if(isset($dir))
                    @foreach($dir as  $key => $blog)
                        <div class="swiper-slide">
                            <div class="card border-0">
                                <div class="bst_dect">
                                    <div class="cmg_div">Coming Soon</div>
                                    <img src="{{URL::to('/').'/Directory/'}}{{$blog->image}}" class="card-img-top" alt="ltItem">
                                    <div class="top_d_text">
                                    <h6><a href="{!! URL::to('directory-details/'.$blog->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $blog->name))) !!}" class="location_btn">{{$blog->name}}</a></h6>
                                            <a href="">20 Places <i class="fas fa-caret-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! $dir->render() !!}
                @endif
            </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div> --}}

    </div>

</section>

@endsection
@push('scripts')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDPuZ9AcP4PHUBgbUsT6PdCRUUkyczJ66I" type="text/javascript"></script>
<script type="text/javascript">
	@php
	$locations = array();
	foreach($businesses as $business){
		$data = array($business->name,floatval($business->lat),floatval($business->lon));
		array_push($locations,$data);
	}
	@endphp
	var locations = <?php echo json_encode($locations); ?>;
	console.log("businessLocations>>"+JSON.stringify(locations));

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

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
@endpush
