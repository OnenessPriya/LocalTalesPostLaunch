@extends('site.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<section class="breadcumb_wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="breadcumb_list">
					<li><a href="{!! URL::to('') !!}">Home</a></li>
					<li><img src="{{asset('site/images/down-arrow.png')}}"></li>
					<li>Local Loop</li>
				</ul>
			</div>
		</div>
	</div>
</section><!--Breadcumb-->

<section class="search_history_wrap">
	<div class="history_grid_header history_grid_header-mod">
		<div class="container">
			<div class="row">
				<div class="col-12 d-flex flex-column flex-md-row align-items-center justify-content-end">
					<div class="search_form_wrap">
						<form>
							<input type="text" name="" placeholder="Seatch  by postcode">
							<button><img src="{{asset('site/images/magnify.png')}}"></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="history_grid_body history_grid_body-mod">
		<div class="container">
			<div class="row m-0 mt-4 loop_card ">
				<div class="col-12 col-lg-7 mb-4">
					@if(count($loops)>0)
					@foreach($loops as $selectedLoop)
					@php
					
					$date1 = new DateTime($selectedLoop->created_at);
					$date2 = new DateTime(date("Y-m-d G:i:s"));
					$difference = $date1->diff($date2);

					$diffInMinutes = $difference->i;
					$diffInHours   = $difference->h;
					$diffInDays    = $difference->d;
					$diffInMonths  = $difference->m;
					@endphp
					<div class="card shadow-sm mb-5">
						<div class="local_item_title">
							<ul class="post-info p-3">
								<li><span class="author-image"><img src="https://via.placeholder.com/40" alt=""></span></li>
								<li>{{ empty($selectedLoop->user['name'])? null:$selectedLoop->user['name'] }} 
								<small class="d-block">
									@if($diffInMonths!=0)
										{{$diffInMonths}} months ago
									@elseif($diffInDays!=0)
										{{$diffInDays}} days ago
									@elseif($diffInHours!=0)
										{{$diffInHours}} hours ago
									@elseif($diffInMinutes!=0)
										{{$diffInMinutes}} minutes ago
									@endif
								</small>
								</li>
							</ul>
							<!-- <div class="feeds_IMG">
								<img width="100%" src="./images/adult-bowl-cute-daylight-1153370.png" alt="">
							</div> -->
							<div class="d-flex justify-content-between align-items-center share_icon p-3">
								<div>
									<a href="{!! URL::to('loop-like/'.$selectedLoop->id) !!}" class="p-2"><i class="far fa-thumbs-up mr-2"></i></a>
									<a href="javascript:void(0);" class="p-2"><i class="far fa-comment mr-2" data-toggle="modal" data-target="#comment{{$selectedLoop->id}}"></i></a>
								</div>
								<div>
									<a href="javascript:void(0)" class="p-2"><i class="fas fa-share mr-2" ></i></a>
								</div>
							</div>
							<p class="pl-3 pr-3 mt-0">
								<span class="d-block text-light"><a href="">{{count($selectedLoop->likes)}} Likes</a></span>
								{!!$selectedLoop->content!!}
								<span class="d-block text-danger"><a href="javascript:void(0)" data-toggle="modal" data-target="#comment{{$selectedLoop->id}}">View {{count($selectedLoop->comments)}}  comment</a></span>
							</p>
							@if(Auth::guard('user')->check())
							<div class="post_sec">
								<form action="{{ route('site.comment.post') }}" method="POST" role="form">
								<div class="input-group mb-0 align-items-center">
								
									@csrf
									<input type="hidden" name="loop_id" value="{{$selectedLoop->id}}">
									<input type="text" class="form-control" name="comment" placeholder="Add a comment…">
									<div class="input-group-append">
									  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>
									</div>
								  </div>
								</form>
							</div>
							@endif
						</div>
					</div>
					<!-- comments-Modal -->
					<div class="modal fade" id="comment{{$selectedLoop->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
								@if(count($selectedLoop->comments)>0)
								@foreach($selectedLoop->comments as $comment)
							  <div class="row no-gutters border-bottom">
								<div class="col-4 col-lg-2 p-0">
									<div class="user-pic">
										<img src="https://via.placeholder.com/100">
									</div>
								</div>
								<div class="col-8 col-lg-10 comment_text">
									<h6>{{$comment->user->name}}</h6>
									<p>
										{{$comment->comment}}
									</p>
									
								</div>
							  </div>
							  @endforeach
							  @else
							  	<p>No comments added till now</p>
							  @endif
							 
							</div>
							@if(Auth::guard('user')->check())
							<form action="{{ route('site.comment.post') }}" method="POST" role="form">
							<div class="modal-footer p-0 border-0">
								
									<div class="post_sec col-12 m-0 pl-0 pr-0">
										<div class="input-group mb-0 align-items-center">
											@csrf
											<input type="hidden" name="loop_id" value="{{$selectedLoop->id}}">
											<input type="text" class="form-control" name="comment" placeholder="Add a comment…">
											<div class="input-group-append">
											  <button class="btn btn-danger btn-sm" type="submit" id="button-addon2">Post</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							@endif
						  </div>
						</div>
					  </div>
					@endforeach
					@endif
				</div>
				<div class="col-12 col-lg-5">
					<div class="sticky-top pl-lg-5">
						<!-- <div class="local_item_title">
							<ul class="post-info p-3">
								<li><span class="author-image"><img src="./images/team-2.jpg" alt=""></span></li>
								<li>jon_dow28<small class="d-block">Jon Dow</small></li>
							</ul>
						</div> -->
						<div class="sidebar-widget popular-posts mb-3">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>Nearby Events</h5>
								</div>
								@foreach($events as $event)
								<div class="post row m-0"> 
									<div class="post-thumb col-4 col-lg-4 p-0">
										@if($event->image!='')<img src="{{URL::to('/').'/events/'}}{{$event->image}}">@endif
									</div>
									<div class="text col-8 col-lg-8">
										<a href="{!! URL::to('event-details/'.$event->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $event->title))) !!}">{{$event->title}}
											<div class="post-info">{{$event->address}}</div>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="sidebar-widget popular-posts mb-3">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>Nearby Deals</h5>
								</div>
								@foreach($deals as $deal)
								<div class="post row m-0"> 
									<div class="post-thumb col-4 col-lg-4 p-0">
										@if($deal->image!='')<img src="{{URL::to('/').'/deals/'}}{{$deal->image}}">@endif
									</div>
									<div class="text col-8 col-lg-8">
										<a href="{!! URL::to('deal-details/'.$deal->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $deal->title))) !!}">{{$deal->title}}
											<div class="post-info">{{$deal->address}}</div>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--Search-list-->
@endsection