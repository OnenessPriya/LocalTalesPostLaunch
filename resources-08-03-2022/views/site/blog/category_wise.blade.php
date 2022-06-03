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
					<li><a href="{!! URL::to('blog-list') !!}">Blogs</a></li>
					<li><img src="{{asset('site/images/down-arrow.png')}}"></li>
					<li>Category Wise Blogs</li>
				</ul>
			</div>
		</div>
	</div>
</section><!--Breadcumb-->

<section class="search_history_wrap">
	<div class="sidebar-page-container mt-4">
		<div class="container">
			<div class="row clearfix">

				<!-- Content Side -->
				<div class="mb-5 col-lg-8 col-md-12 col-sm-12">
                    

                    <!-- Related Projects -->
                    <div class="related-projects">
                        <!-- <h3>Related Posts</h3> -->
                        <div class="row clearfix">

                        	@foreach($blogs as $relatedBlog)
                            <!-- News Block -->
                            <div class="news-block mb-5 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInRight animated" data-wow-delay="0ms"
                                    data-wow-duration="1500ms"
                                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">
                                    <div class="image">
                                        <a href="#"><img src="{{URL::to('/').'/blogs/'}}{{$relatedBlog->image}}" alt=""></a>
                                        <div class="post-date">{{date("M d, Y",strtotime($relatedBlog->created_at))}}</div>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-info">
                                            <li>By: Admin</li>
                                            <li>Category: <span>{{$relatedBlog->category->title}}</span></li>
                                        </ul>
                                        <h4><a href="#">{{$relatedBlog->title}}</a>
                                        </h4>
                                        <div class="text">{{strip_tags(substr($relatedBlog->description,0,100))}}...
                                        </div>
                                        <a href="{!! URL::to('blog-details/'.$relatedBlog->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $relatedBlog->title))) !!}" class="read-more theme-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- News Block -->
                            <!-- <div class="news-block mb-5 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInRight animated" data-wow-delay="0ms"
                                    data-wow-duration="1500ms"
                                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">
                                    <div class="image">
                                        <a href="#"><img src="./images/cards-1066386_1920.png" alt=""></a>
                                        <div class="post-date">June 26, 2021</div>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-info">
                                            <li>By: Admin</li>
                                            <li>Category: <span>Disinfection</span></li>
                                        </ul>
                                        <h4><a href="#">Important Questions to Ask Sanitizer Company</a>
                                        </h4>
                                        <div class="text">Iste natus error voluptatem accusan dolremque laudantis totam.
                                        </div>
                                        <a href="#" class="read-more theme-btn">Read More</a>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>

                    <!-- <div class="comments-area py-5">
                        <div class="group-title">
                            <h5>Comments</h5>
                        </div>

                        <div class="comment-box">
                            <div class="comment">
                                <div class="author-thumb d-flex justify-content-center align-items-center"><img src="./images/team-2.jpg" alt=""></div>
                                <div class="comment-info clearfix"><strong>Smith Hazel</strong>
                                    <div class="comment-time">10 August 2021 at 7:00 PM</div>
                                </div>
                                <div class="text">Tempor incididunt ut labore et dolore magna aliqua. Ut enim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip exa duis.</div>
                                <a class="theme-btn reply-btn" href="#">reply</a>
                            </div>
                        </div>

                        <div class="comment-box">
                            <div class="comment">
                                <div class="author-thumb d-flex justify-content-center align-items-center"><img src="./images/team-2.jpg" alt=""></div>
                                <div class="comment-info clearfix"><strong>Scralett Luna</strong>
                                    <div class="comment-time">10 August 2021 at 7:00 PM</div>
                                </div>
                                <div class="text">Tempor incididunt ut labore et dolore magna aliqua. Ut enim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip exa duis.</div>
                                <a class="theme-btn reply-btn" href="#">Reply</a>
                            </div>
                        </div>

                    </div> -->

                    <!-- Comment Form -->
                    <!-- <div class="comment-form">

                        <div class="group-title">
                            <h5>Post Reply</h5>
                        </div>

                        
                        <form method="post"">
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea class="" name="message" placeholder="Your Message" spellcheck="false"></textarea>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Your Name" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class=" btn-style-one mt-3" type="submit" name="submit-form">send comment</button>
                                </div>

                            </div>
                        </form>

                    </div> -->

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
					</aside>
				</div>

			</div>
		</div>
	</div>
</section><!--Search-list-->
@endsection