<section class="newsletter-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<h2 class="main-heading">Subscribe For a Newsletter</h2>
				<p>Whant to be notified about new locations ? Just sign up.</p>
			</div>
			<div class="col-md-6">
				<form id="" action="" class="news">
					<input type="text" id="usr" placeholder="Enter your email">
					<input type="submit" id="43t" value="Send">
				</form>
			</div>
		</div>
	</div>
</section>
<footer>
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<a href="#" class="footer-logo">
					<img src="{{ asset('site/images/logo.png')}}">
				</a>
				<p>
					Award-winning, in-store coffee roastery, coffee bean boutique and sydney cbd cafe. VELLA NERO is a one stop shop for all thing coffee.
				</p>
			</div>
			<!-- <div class="col-md-2">
				<h3 class="footer-heading">State</h3>
				<ul class="footer-list">
					<li><a href="#">Australian Capital Territory</a></li>
					<li><a href="#">New South Wales</a></li>
					<li><a href="#">Northern Territory</a></li>
					<li><a href="#">Queensland</a></li>
					<li><a href="#">South Australia</a></li>
					<li><a href="#">Tasmania</a></li>
					<li><a href="#">Victoria</a></li>
					<li><a href="#">Western Australia</a></li>
				</ul>
			</div> -->
			<div class="col-md-2">
				<h3 class="footer-heading">Products</h3>
				<ul class="footer-list">
					<li><a href="{!! URL::to('directory-list') !!}">Local Directory</a></li>
					<li><a href="{!! URL::to('event-list') !!}">Local Events </a></li>
					<li><a href="{!! URL::to('deal-list') !!}">Local Deals </a></li>
					<li><a href="{!! URL::to('local-loops') !!}">Local Loop</a></li>
					<li><a href="{!! URL::to('business/login') !!}">Business Login</a></li>
				</ul>
			</div>
			<div class="col-md-2">
				<h3 class="footer-heading">Other</h3>
				<ul class="footer-list">
					<li><a href="{!! URL::to('blog-list') !!}">Blogs</a></li>
					<li><a href="{!! URL::to('about-us') !!}">About Us</a></li>
					<!-- <li><a href="#">Contact Us</a></li> -->
					<li><a href="#">FAQs</a></li>
					<li><a href="{!! URL::to('terms-of-use') !!}">Terms Of Use</a></li>
					<li><a href="{!! URL::to('privacy-policy') !!}">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-2">
			</div>
		</div>
	</div>
	<div class="copyright">© 2021 {{ config('app.name') }}. All Rights Reserved.</div>
</footer>