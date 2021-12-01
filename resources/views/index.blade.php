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
			
			 <div class="container-fluid search-section">
			   <div class="container">
			     <div class="row justify-content-center align-items-center">
				     <div class="col-md-10 col-sm-12 col-12">
					   <div class="col-md-12 title-search">
						 <h2> We Help Students and Tutors Find Each Other </h2>
						</div>
							<div class="row" id="pin-serach">
									<div class="col-xl-3 col-lg-3 col-md-3 col-12 pin-0 p-0">
									  <div class="searching-products mobile-searching-products">
											<form action="#" method="get">
												<div class="input-group">
													<input type="text" class="form-control search"
														placeholder="Aera Search" id="search" autocomplete="off">
														<a href="#0" class="input-group-text" id="basic-addon1">
														<i class="icon-magnifier"></i>
													</a>
												</div>
											</form>
										</div>
									</div>
									
									<div class="col-xl-3 col-lg-3 col-md-3 col-12 pin-0 p-0">
									  <div class="form-group select-pincode">
										  <select class="form-control form-select" id="">
											<option>Alwar</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										  </select>
										</div>
									</div>
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-12 pdr-0 p-0">
										<div class="searching-products mobile-searching-products">
											<form action="#" method="get">
												<div class="input-group">
													
													<input type="text" class="form-control search"
														placeholder="Enter Course or Subject Keywords to Search" id="search" autocomplete="off">
														<a href="#0" class="input-group-text" id="basic-addon1">
														<i class="icon-magnifier"></i>
													</a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
								
					  </div>
				  </div>
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
								<a href="{{ route('login') }}" class="btn btn-fill">Login / Signup</a>
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


			<div class="container-fluid megacourse-menu"> 
					<div class="container p-0">
						<div class="row">
						@if($categories)
						@foreach($categories as $cat)
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-one">
							<div class="menu-heading"></div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">{{ $cat->name }}</a></li>
								   	@foreach($cat['SubCategory'] as $subcat)
								   	<li class="megamenu-links2"><a href="#0">{{ $subcat->name }}</a></li>
										@php
										$courses = DB::table('courses')->where('category_id', $cat->id)->where('sub_category_id', $subcat->id)->where('status', '1')->where('delete_status', '1')->get();
										@endphp
								
										<!-- <ul> -->
											@foreach($courses as $course)
											<li class="megamenu-link2"><a href="#0" class="">{{ $course->name }}</a></li>
											@endforeach
										<!-- </ul> -->
									@endforeach
								</ul>
							</div>
						</div>
						@endforeach
						@endif
						
						<!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-two">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">Subject</a></li>
								<li class="megamenu-links2">
									<a href="#0">All</a><span>|</span>
									<a href="#0">All</a><span>|</span>
									<a href="#0">Mathematics</a><span>|</span>
									<a href="#0">English</a><span>|</span>
									<a href="#0">Science</a><span>|</span>
									<a href="#0">Physics </a><span>|</span><br>
									<a href="#0">Hindi</a><span>|</span>
									<a href="#0">Chemestry</a><span>|</span>
									<a href="#0">Biology</a><span>|</span>
									<a href="#0">Accounting</a><span>|</span>
									<a href="#0">Economics</a><span>|</span>
								</li>
								</ul>
							</div>
						</div>
						
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">College</a></li>
								<li class="megamenu-links2">
									<a href="#0">B.Tech Tuition</a><span>|</span>
									<a href="#0">B.Com Tuition</a><span>|</span>
									<a href="#0">BAA Tuition</a><span>|</span>
									<a href="#0">BSC Tuition</a><span>|</span><br>
									<a href="#0">Engineering Diploma</a><span>|</span>
									<a href="#0">MBA</a><span>|</span>
									<a href="#0">BHMS</a><span>|</span>
									<a href="#0">BAMS</a><span>|</span>
									<a href="#0">MBBS</a><span>|</span>
								</li>
								</ul>
							</div>
						</div>

						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">Exam Coaching</a></li>
								<li class="megamenu-links2">
								<a href="#0">Engineering Entrance</a><span>|</span>
										<a href="#0">CA Coaching</a><span>|</span>
										<a href="#0">MBA Entrance</a><span>|</span><br>
										<a href="#0">Medical Entrance</a><span>|</span>
										<a href="#0">CET</a><span>|</span>
										<a href="#0">IBPS Exam</a><span>|</span>
										<a href="#0">UPSC Exam</a><span>|</span><br>
										<a href="#0">SSC Exam</a><span>|</span>
										<a href="#0">Bank Clerical Exam</a><span>|</span>
										<a href="#0">UGC NET</a><span>|</span>
								</li>
								</ul>
							</div>
						</div>


						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">IT Courses<span style="display:block;">Programming Language</span></a></li>
								<li class="megamenu-links2">
								<a href="#0">JAVA Training</a><span>|</span>
								<a href="#0">Payton Training</a><span>|</span>
								<a href="#0">.NET Training</a><span>|</span><br>
								<a href="#0">C Training</a><span>|</span>
								<a href="#0">C++ Training</a><span>|</span>
								</li>
								</ul>
							</div>
						</div>

						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">IT Courses<span style="display:block;">IT Training</span></a></li>
								<li class="megamenu-links2">
								<a href="#0">SAP</a><span>|</span>
								<a href="#0">Microsoft EXCEL ,PPT ,WORD </a><span>|</span>
								<a href="#0">Amazon Web Services</a>
								</li>
								</ul>
							</div>
						</div>


						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">IT Courses<span style="display:block;">WEB Development</span></a></li>
								<li class="megamenu-links2">
								<a href="#0">PHP</a><span>|</span>
								<a href="#0">Java Script Training</a>
								</li>
								</ul>
							</div>
						</div>

						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">IT Courses<span style="display:block;">othert</span></a></li>
								<li class="megamenu-links2">
								<a href="#0">Adobe Photoshop Training</a><span>|</span>
								<a href="#0">Data Science</a>
								</li>
								</ul>
							</div>
						</div>


						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">Hobby Classes<span style="display:block;">Dance & Music</span></a></li>
								<li class="megamenu-links2">
								<a href="#0"> Dance </a><span>|</span>
								<a href="#0"> Hindustani Music </a><span>|</span>
								<a href="#0"> Guitar </a><span>|</span>
								<a href="#0"> Carnatic Music </a><span>|</span><br>
								<a href="#0"> Keyboard </a><span>|</span>
								<a href="#0"> Singing </a><span>|</span>
								<a href="#0"> Violin </a><span>|</span>
								<a href="#0"> Piano</a>
								</li>
								</ul>
							</div>
						</div>

						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">Hobby Classes<span style="display:block;">Other Hobbies</span></a></li>
								<li class="megamenu-links2">
								<a href="#0"> Yoga  </a><span>|</span>
								<a href="#0"> cooking </a><span>|</span>
								<a href="#0"> Photography </a><span>|</span>
								<a href="#0"> Drawing </a><span>|</span><br>
								<a href="#0"> painting </a><span>|</span>
								<a href="#0"> Makeup  </a><span>|</span>
								<a href="#0"> Handwriting </a>
								</li>
								</ul>
							</div>
						</div>



						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">Languages<span style="display:block;">Foreign Language</span></a></li>
								<li class="megamenu-links2">
								<a href="#0"> Spoken English  </a><span>|</span>
								<a href="#0"> German Language </a><span>|</span>
								<a href="#0"> French Language </a><br>
								<a href="#0"> Spanish Language </a><span>|</span>
								<a href="#0"> Russian Language </a><span>|</span><br>
								<a href="#0"> Japanese Language  </a><span>|</span>
								<a href="#0"> Chinese Language </a><span>|</span><br>
								<a href="#0"> Arabic Language </a><span>|</span>
								<a href="#0"> Italian Language </a>
								</li>
								</ul>
							</div>
						</div>

						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">Internship</a></li>
								<li class="megamenu-links2">
								<a href="#0"> BE/Btech  </a><span>|</span>
								<a href="#0"> MBA  </a><span>|</span>
								<a href="#0"> other</a>
								</li>
								</ul>
							</div>
						</div>


						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 menu-box-three">
							<div class="menu-heading">
							</div>
							<div class="megamenu-links">
								<ul>
								<li><a href="#0">More </a></li>
								<li class="megamenu-links2">
								<a href="#0"> NCERT Solutions </a><span>|</span>
								<a href="#0"> CBSC Syllabus  </a><span>|</span>
								<a href="#0"> All tuitions</a><span>|</span>
								<a href="#0"> IIT JEE</a><span>|</span><br>
								<a href="#0"> AIIMS</a><span>|</span>
								<a href="#0"> CAT</a><span>|</span>
								<a href="#0"> GATE</a><span>|</span>
								<a href="#0"> GRE</a><span>|</span>
								<a href="#0"> GMAT</a>
								</li>
								</ul>
							</div>
						</div> -->

						
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
							<p>Indianhometutor is India's largest and most trusted Learning Network. Our vision is to be one-stop learning partner for every Indian with Verified Tutors, Trainers & Institutes, we are a trusted partner of choice for students, parents and professionals visiting us every month to fulfill learning requirements across more than 1000 categories.</p>
							<p class="mb-15">
							Using Indianhometutor.com, students, parents and professionals can compare multiple Tutors, Trainers and Institutes and choose the ones that best suit their requirements.
							</p>
							<p class="mb-10">
							If you are a Tutor, Trainer or an Institute, you can get relevant enquiries based on your skills and offer online as well as offline coaching services.
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
							<a href="{{ route('student.form') }}" class="theme-btn btn-style-one">
							 <span class="txt">Student</span>
							</a>
							<a href="{{ route('tutor.form') }}" class="theme-btn btn-style-one">
							 <span class="txt">Tutor</span>
							</a>
							<a href="{{ route('institute.form') }}" class="theme-btn btn-style-one">
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