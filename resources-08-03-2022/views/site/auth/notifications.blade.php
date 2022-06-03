@extends('site.appprofile')
@section('title') Dashboard @endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<ul class="search_list_items search_list_items-mod">
	  			@foreach($notifications as $notification)
	  			<li>
					<div class="list_content_wrap row m-0" style="width: 100%;">
					  	<h6>{{$notification->title}}</h6>
						<p class="history_details" >{!!$notification->description!!}</p>
						
					</div>
	  			</li>
	  			@endforeach
	  		</ul>
		</div>
	</div>
</div>
@endsection