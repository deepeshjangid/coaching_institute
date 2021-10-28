@extends('layouts.app')

@section('content')
	     <!---- Silder Area Section --->
			<div class="container-fluid p-0 sliders">
			   <div id="demo" class="carousel slide" data-ride="carousel">
			      <div class="carousel-inner">
				    <div class="carousel-item bg-set-image-1 active"></div>
				    <div class="carousel-item bg-set-image-2 "></div>
				    <div class="carousel-item bg-set-image-3 "></div>
					 </div>
					 
					   <!-- Left and right controls -->
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="fa fa-angle-left angle-left"></span>
				  </a>
				  <a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="fa fa-angle-right angle-right"></span>
				  </a>
			   </div>
		    </div>
			 
			 
			 <div class="container-fluid info-section">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-md-6 col-sm-12">
							<div class="banner-card d-flex align-items-center">
								<div class="banner-count">
									<h2>54</h2>
								</div>
								<div class="banner-contents">
									<h2>Courses &amp; Prograns</h2>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-12">
							<div class="banner-card d-flex align-items-center">
								<div class="banner-count">
									<h2>1M</h2>
								</div>
								<div class="banner-contents">
									<h2>Professor &amp; Instructors</h2>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-12">
							<div class="banner-card d-flex align-items-center">
								<div class="banner-count">
									<h2>2M</h2>
								</div>
								<div class="banner-contents">
									<h2>Students &amp; Learners</h2>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-12">
							<div class="banner-card d-flex align-items-center">
								<div class="banner-count">
									<h2>200</h2>
								</div>
								<div class="banner-contents">
									<h2>Events &amp; Sessions</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--- Welcome Section ---->
			<div class="benefits-section">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-md-12 col-12 col-sm-12 col-lg">
							<div class="benefit-header">
								<h6>SUBSCRIPTION PLAN</h6>
								<h2>Discover our Top School Child Benefits</h2>
								<a href="#0" class="btn btn-fill">Login / Signup</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-12 col-lg">
							<div class="benefit-widget benefit-widget-clr1">
								<h2>Schools</h2>
								<p>When you look at schools, ask about the kinds of studies that they offer.</p>
								<a href="#0" class="btn btn-trans clr-yellow">Book Now</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-12 col-lg">
							<div class="benefit-widget benefit-widget-clr2">
								<h2>Classes</h2>
								<p>When you look at schools, ask about the kinds of studies that they offer.</p>
								<a href="#0" class="btn btn-trans clr-rose">Book Now</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-12 col-lg">
							<div class="benefit-widget benefit-widget-clr3">
								<h2>Courses</h2>
								<p>When you look at schools, ask about the kinds of studies that they offer.</p>
								<a href="#" class="btn btn-trans clr-blue">Book Now</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-12 col-lg">
							<div class="benefit-widget benefit-widget-clr4">
								<h2>Teachers</h2>
								<p>When you look at schools, ask about the kinds of studies that they offer.</p>
								<a href="#" class="btn btn-trans clr-cyan">Book Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			 <!---- About Section ----->
			<div class="container-fluid" id="about">
				<div class="container">
					<div class="row section-content align-items-center justify-content-center">
						<div class="col-sm-12 col-md-6">
							<h3><span>Welcome To Coaching Institute </span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Quos dolo rem consequ untur, natus laudantium commodi earum aliquid in ullam.Lorem ipsum.</p>
							<p class="mb-15">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sunt ut dolorem laboriosam culpa excepturi sed distinctio eius! Ut magnam numquam libero quia vero blanditiis fugit corporis quisquam, debitis quidem
								laudantium deleniti.
							</p>
							<p class="mb-10">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sunt ut dolorem laboriosam culpa excepturi sed distinctio eius! Ut magnam numquam libero quia vero blanditiis fugit corporis quisquam, debitis quidem
								laudantium deleniti.
							</p>
					   </div>
						
						<div class="col-sm-12 col-md-6 mt-10">
							<div class="about-images">
									<img alt="" src="{{ asset('assets/images/about1.png') }}" class="img-fluid">
								</a>
							</div>
						</div>
					  </div>
					</div>
				</div>
				
				
		 <!---- Banner Section ----->
			<div class="container-fluid call-to-action-section-two" style="background-image: url({{ asset('assets/images/3.png') }}">
				<div class="container">
					<div class="content">
						<h2>I'm A (static)</h2>
						<div class="text"> Replenish him third creature and meat blessed void a fruit gathered you’re, they’re two <br> waters own morning gathered greater shall had behold had seed.</div>
						<div class="buttons-box">
							<a href="{{ route('student.profile.update') }}" class="theme-btn btn-style-one">
							 <span class="txt">Student</span>
							</a>
							<a href="{{ route('tutor.profile.update') }}" class="theme-btn btn-style-one">
							 <span class="txt">Tutor</span>
							</a>
							<a href="#0" class="theme-btn btn-style-one">
							 <span class="txt">Coaching\Institute</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			<!--- Testimonials --->
			<div class="container-fluid testimonial-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="sec-title pull-left">
								<h3>Testimonials</h3>
							</div>
						</div>
					</div>
					<div class="row">
					  <div class="testimonial-item">
						@forelse ($testimonials as $testimonial)
						<div class="col-md-12">
							<div class="single-testimonial-item text-center">
								<div class="img-holder">
									<img src="{{ asset('uploads/testimonials/'.$testimonial->image) }}" alt="testimonials" class="img-fluid">
								</div>
								<div class="text-holder">
									<p>{{ $testimonial->about }}</p>
								</div>
								<span class="border"></span>
								 <div class="name">
									<h3>{{ $testimonial->name }}</h3>
								</div>
							</div>
						</div>
						@empty
							<p>Data Not Found</p>
						@endforelse
				   </div>
				</div>
			</div>
			
@endsection	