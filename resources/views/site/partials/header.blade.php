<header>
	<div class="header-container">
		<div class="row align-items-center">
			<div class="col-auto col-sm-auto">
				<a href="{!! URL::to('') !!}" class="logo">
					<img src="{{ asset('site/images/logo.png ')}}">
				</a>
			</div>

			<div class="col col-sm-auto order-sm-3 order-lg-last p-0 pl-sm-3 pr-sm-3">
				<ul class="button-list">
					<li>
						@if(Auth::guard('user')->check())
						<a href="{!! URL::to('site-edit-profile') !!}">
							<!-- <span><img src="{{ asset('site/images/login-icon.png ')}}"></span> -->

							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
							<span>Hi, {{Auth::guard('user')->user()->name}}</span>
						</a>
						@else
						<a href="{!! URL::to('login') !!}">
							<!-- <span><img src="{{ asset('site/images/login-icon.png ')}}"></span> -->
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
							<span>Login</span>
						</a>
						@endif
					</li>
					<li>
						<a href="{!! URL::to('business/login') !!}" class="business_login">
							<!-- <span><img src="{{ asset('site/images/listing-icon.png ')}}"></span> -->
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
							<span>Business Login</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-auto col-sm order-sm-last order-lg-2">
				<div class="left-header">
					<div class="navigation">
						<ul class="menu">
							<li><a href="{!! URL::to('') !!}">Home</a></li>
							<!-- <li><a href="#">Postcodes <span><i class="fas fa-chevron-down"></i></span> </a>
								<ul>
									<li><a href="#">Queensland</a></li>
									<li><a href="#">Victoria</a></li>
									<li><a href="#">New South Wales</a></li>
									<li><a href="#">Tasmania</a></li>
									<li><a href="#">South Australia</a></li>
									<li><a href="#">Western Australia</a></li>
									<li><a href="#">Northern Territory</a></li>
									<li><a href="#">Australian Capital Territory </a></li>
								</ul>
							</li> -->
							<li><a href="{!! URL::to('directory-list') !!}">Local Directory</a></li>
							<li><a href="{!! URL::to('event-list') !!}">Local Events </a></li>
							<li><a href="{!! URL::to('deal-list') !!}">Local Deals </a></li>
							<li><a href="{!! URL::to('local-loops') !!}">Local Loop</a></li>
							 <li><a href="{!! URL::to('local-product') !!}">Product</a></li>
							<li><a href="{!! URL::to('get-quotes') !!}">Get quotes</a></li>
						</ul>
					</div>

					<div class="ham">
						<img src="{{ asset('site/images/menu-toggle.png ')}}">
					</div>
				</div>
			</div>
		</div>
	</div>

</header>
