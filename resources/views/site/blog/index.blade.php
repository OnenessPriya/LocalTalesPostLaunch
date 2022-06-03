@extends('site.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

<section class="page-banner" style="background: url({{asset('site/images/banner')}}-image.jpg) no-repeat center center; background-size:cover;">
	<div class="container">
		<div class="page-title">Blogs</div>
		<div class="page-search-block">
			<div class="row align-items-center justify-content-between">
				<div class="col">
					<div class="search_form_wrap">
						<form action="">
							<input type="text" name="pin" placeholder="Seatch by Title">
							<button><img src="{{asset('site/images/magnify.png')}}"></button>
						</form>
					</div>
				</div>
				<div class="col-sm-auto">
					<ul class="breadcumb_list">
						<li><a href="{!! URL::to('') !!}">Home</a></li>
						<li>/</li>
						<li>Blogs</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Breadcumb-->

<section class="search_history_wrap">
	
	<div class="sidebar-page-container">
		<div class="container">
			<div class="row clearfix">

				<!-- Content Side -->
				<div class="mb-5 col-lg-8 col-md-12 col-sm-12">
					<div class="our-blogs">

						@foreach($blogs as $blog)
						<!-- News Block Two -->
						<div class="news-block-two">
							<div class="inner-box position-relative">
								<div class="position-relative">
									<a href="#"><img width="100%" src="{{URL::to('/').'/blogs/'}}{{$blog->image}}" alt=""></a>
									<div class="post-date">
										<h6>{{date("d",strtotime($blog->created_at))}} <span class="d-block">{{date("M",strtotime($blog->created_at))}}</span></h6>
									</div>
								</div>
								<div class="lower-content">
									<ul class="post-info">
										<li><span class="author-image"><img src="https://via.placeholder.com/100" alt=""></span>By: Admin
										</li>
										<li>Category: <span class="theme_color">{{$blog->category->title}}</span></li>
										<!-- <li>Comments: 150</li> -->
									</ul>
									<h3><a href="#">{{$blog->title}}</a></h3>
									<div class="text">{{strip_tags(substr($blog->description,0,300))}}...
									</div>
									<a href="{!! URL::to('blog-details/'.$blog->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $blog->title))) !!}">View Details <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="-40" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span></a>
								</div>
							</div>
						</div>
						@endforeach

						
						{{ $blogs->links() }}

					</div>
				</div>

				<!-- Sidebar Side -->
				<div class="mb-5 col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar">
						<!-- category -->
						<div class="sidebar-widget category-widget-two">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>Categories</h5>
								</div>

								<ul class="cat-list-two">
									@foreach($categories as $category)
									<li><a href="{!! URL::to('category-wise-blogs/'.$category->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $category->title))) !!}">{{$category->title}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>

						<!-- Popular Posts -->
						<div class="sidebar-widget popular-posts">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>Popular Blogs</h5>
								</div>

								@foreach($latestBlogs as $blog)
								<div class="post d-flex align-items-center justify-content-around">
									<div class="post-thumb w-50">
										<img src="{{URL::to('/').'/blogs/'}}{{$blog->image}}" alt="">
									</div>
									<div class="text">
										<a href="{!! URL::to('blog-details/'.$blog->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $blog->title))) !!}">{{$blog->title}}</a>
										<div class="post-info">{{date("M d,Y",strtotime($blog->created_at))}}</div>
									</div>
								</div>
								@endforeach

								
							</div>
						</div>


						<!-- Popular Posts -->
						<div class="sidebar-widget popular-tags">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>Popular Tags</h5>
								</div>
								@foreach($tags as $tag)
								<a href="javascript:void(0);">{{$tag->tag}}</a>
								@endforeach
							</div>
						</div>

					</aside>
				</div>

			</div>
		</div>
	</div>
</section><!--Search-list-->
@endsection