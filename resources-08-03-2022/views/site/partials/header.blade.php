<header>
	<a href="{!! URL::to('') !!}" class="logo">
		<img src="{{ asset('site/images/logo.png ')}}">
	</a>
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
			</ul>
		</div>
		<ul class="button-list">
			<li>
				@if(Auth::guard('user')->check())
				<a href="{!! URL::to('site-edit-profile') !!}">
					<!-- <span><img src="{{ asset('site/images/login-icon.png ')}}"></span> -->
					
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
					Hi, {{Auth::guard('user')->user()->name}} 
				</a>
				@else
				<a href="{!! URL::to('login') !!}">
					<!-- <span><img src="{{ asset('site/images/login-icon.png ')}}"></span> -->

					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
					Login
				</a>
				@endif
			</li>
			<li>
				<a href="{!! URL::to('business/login') !!}">
					<!-- <span><img src="{{ asset('site/images/listing-icon.png ')}}"></span> -->
					
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
					Business Login
				</a>
			</li>
		</ul>
		<div class="ham">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>

</header>