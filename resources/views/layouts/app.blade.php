<!DOCTYPE html>
<html lang="en">
<head>
   <title> {{ config('app.name', 'Laravel') }} </title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="theme-color" content="#"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="shortcut icon" type="images/x-icon" href="{{ asset('assets/images/favicon.png') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">	
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/carousel.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
		
</head>
<body>
	  <!--- Header Area Section--->
		   <div class="container-fluid p-0" id="manu-bg">
				 <div class="container">
					   <nav class="navbar navbar-expand-md navigation-bar top-fixed myheader">
					 <a class="navbar-brand my-logos" href="{{ route('index') }}">
					  <span style="font-weight:bold;font-size:26px;">LOGO</span>
					 <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo" style="display:none;"></a>
					  <ul class="mobile-call mobile-user">
						
									<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">
										<button type="button" class="site-button onlineCbseBtn">Login</button> </a>
									</li>
									<li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">
										<button type="button" class="site-button onlineCbseBtn Zokelijk-btn">Sign up</button> </a>
									</li>
						 </ul>
					 
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span> <i class="fa fa-bars" aria-hidden="true"></i> </span>
					  </button>
					 
						<div class="collapse navbar-collapse" id="collapsibleNavbar">
							 <ul class="navbar-nav ml-auto manubar">
							   <li class="nav-item active"><a class="nav-link " href="{{ route('index') }}">Home</a></li>
							   <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
							   <li class="nav-item"><a class="nav-link" href="{{ route('subscription.plan') }}">Subscription Plan</a></li>
							   <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact us</a></li>
							</ul>
							 <ul class="navbar-nav mobile-call">
								@if(Session::has('user_login'))
							
									<li class="nav-item"><a class="nav-link" 
									href="@if(Session::get('user_type')=='1'){{ route('student.profile') }}
										@elseif(Session::get('user_type')=='2'){{ route('tutor.profile') }}
										@elseif(Session::get('user_type')=='3'){{ route('institute.profile') }}
										@endif">
										<button type="button" class="site-button onlineCbseBtn Zokelijk-btn">Profile</button> </a>
									</li>
									<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">
										<button type="button" class="site-button onlineCbseBtn">Log Out</button> </a>
									</li>
								@else
									<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">
										<button type="button" class="site-button onlineCbseBtn">Login</button> </a>
									</li>
									<li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">
										<button type="button" class="site-button onlineCbseBtn Zokelijk-btn">Sign up</button> </a>
									</li>
								@endif
								
							 </ul>
						  </div>  
				      </div>
			     </nav>
			 </div>  
			 </div>  


             @yield('content')

			 <div class="toast" data-autohide="true" style="padding:20px;border-radius: 10px;">
        <div class="toast-body">kjsddddddddddddd

        </div>
    </div>
    <div id="preloader" style="display: none;">
        <div class="loader_spinner_inside"></div>
        <span class="loader_spinner_text">Please Wait...</span>
    </div>

             	<!--Arrow -->
			<div class="scroll-to-top scroll-to-target">
			  <span class="fa fa-arrow-circle-up"></span>
			</div>
			
			
	<!--Main Footer Section -->
		<footer class="main-footer">
			<div class="pattern-layer paroller"style="background-image:url({{ asset('assets/images/icon-1.png')}})"></div>
			<div class="pattern-layer-two" style="background-image:url({{ asset('assets/images/icon-3.png')}})"></div>
			 <div class="container">
				<div class="widgets-section">
					<div class="row">
						<div class="big-column col-lg-6 col-md-12 col-sm-12">
							<div class="row">
								<div class="footer-column col-lg-7 col-md-6 col-sm-12">
									<div class="footer-widget logo-widget">
										<div class="logo">
											<a href="{{ route('index') }}"> <span style="font-weight:bold;font-size:26px;">LOGO</span>
											<!-- <img src="images/footer-logo.png" alt="" /> --> </a>
										</div>
										<div class="text"> Replenish him third creature and meat blessed void a fruit gathered you’re, they’re two waters own morning gathered greater. Using Indianhometutor.com.</div>
										<div class="social-box">
											<a href="#" class="fa fa-facebook"></a>
											<a href="#" class="fa fa-instagram"></a>
											<a href="#" class="fa fa-twitter"></a>
											<a href="#" class="fa fa-google"></a>
											<a href="#" class="fa fa-pinterest-p"></a>
										</div>
									</div>
								</div>
								
								<!--Footer Column-->
								<div class="footer-column col-lg-5 col-md-6 col-sm-12">
									<div class="footer-widget links-widget">
										<h4>About Us</h4>
										<ul class="links-widget">
											<li><a href="#">Afficiates</a></li>
											<li><a href="#">Partners</a></li>
											<li><a href="#">Reviews</a></li>
											<li><a href="#">Blogs</a></li>
											<li><a href="#">Newsletter</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
					
						<div class="big-column col-lg-6 col-md-12 col-sm-12">
							<div class="row">
								<div class="footer-column col-lg-6 col-md-6 col-sm-12">
									<div class="footer-widget links-widget">
										<h4>Quick Links</h4>
										<ul class="links-widget">
											<li><a href="#">Privacy Policy</a></li>
											<li><a href="#">Support Area</a></li>
											<li><a href="#">Documentations</a></li>
											<li><a href="#">How it works</a></li>
											<li><a href="#">Terms of Policy</a></li>
										</ul>
									</div>
								</div>
								
						
								<div class="footer-column col-lg-6 col-md-6 col-sm-12">
									<div class="footer-widget links-widget">
										<h4>Contact Us </h4>
										 <div class="sigle-address">
											<div class="address-icon1">
												<i class="fa fa-home"></i>
											</div>
											<p>@if($contact) {{ $contact->address }} @endif</p>
										</div>
										<div class="sigle-address">
											<div class="address-icon1">
												<i class="fa fa-envelope-o"></i>
											</div>
											<p>@if($contact) {{ $contact->email }} @endif</p>
										</div>
										<div class="sigle-address">
											<div class="address-icon1">
												<i class="fa fa-phone"></i>
											</div>
											<p>@if($contact) {{ $contact->mobile }} @endif</p>
										</div>
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
	

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slider-one.js') }}"></script>
<!-- <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}" type="text/javascript"></script> -->

<script src="{{asset('assets/js/sweetalert.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" language="javascript" src="{{ asset('assets/js/common.js') }}"></script>

<script>
		$(document).ready(function(){

			@if(Session::has('error'))
				showMsg('error', "{{ Session::get('error') }}")
			@elseif(Session::has('success'))
				showMsg('success', "{{ Session::get('success') }}")
			@endif

		});
    </script>
 <script>
	 $(document).ready(function () {
		 $(window).scroll(function () {
			 if ($(this).scrollTop() > 300) {
				 $('.scroll-to-top').fadeIn();
			 } else {
				 $('.scroll-to-top').fadeOut();
			 }
		 });
		$('.scroll-to-top').click(function () {
			 $("html, body").animate({
				 scrollTop: 0
			 }, 2000);
			 return false;
		 });
	   });
  </script>
</body>
</html>


	 