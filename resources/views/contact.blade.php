@extends('layouts.app')

@section('content')
	    
			   <section class="page-title">
					<div class="container">
						<div class="row clearfix">
							<div class="col-lg-8 col-md-12 col-sm-12 content-column">
								<div class="content-box clearfix">
									<div class="title pull-left">
										<h1>Contact</h1>
									</div>
									<ul class="bread-crumb pull-right clearfix">
										<li><a href="{{ route('index') }}">Home</a></li>
										<li>Contact Us</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
		
				 <div class="container-fluid contact-style pb-100 md-pb-80 ">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-12 md-mb-30 col-md-4">
								<div class="address-item">
									<div class="address-icon">
										<i class="fa fa-mobile" aria-hidden="true"></i>
									</div>
									<div class="address-text">
										<h3 class="contact-title">Call Us</h3>
											<p><a href="tel:123456789">@if($row) {{ $row->mobile }} @endif</a></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-12 md-mb-30 col-md-4">
								<div class="address-item">
									<div class="address-icon">
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
									</div>
									<div class="address-text">
										<h3 class="contact-title">Mail Us</h3>
											<p><a href="mailto:info@indianhometutor.com">@if($row) {{ $row->email }} @endif</a></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-12 md-mb-30 col-md-4">
								<div class="address-item">
									<div class="address-icon">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
									</div>
									<div class="address-text">
										<h3 class="contact-title">Address</h3>
										<p>@if($row) {{ $row->address }} @endif</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		  	
				<div class="container-fluid map">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-12 col-md-6">
							  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58691.85569912979!2d79.91277540205775!3d23.161403279888862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981ae7152dea283%3A0xb02290c37461e488!2sJabalpur%2C%20Madhya%20Pradesh%20482001!5e0!3m2!1sen!2sin!4v1637236410700!5m2!1sen!2sin" width="100%" height="550px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
								
							</div>
							<div class="col-lg-7 col-12 col-md-6 content-part">
								<div class="row">
									<div class="content-heading">
										<h2 class="heading">Get In Touch</h2>
										<p class="margin-0 pb-45">
										<div class="form-part">
											<form class="contact-form"  id="form" action="{{ route('contact.submit' )}}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="row">
													<div class="col-lg-6 col-12 mb-20">
														<input class="form-control" type="text" id="name" name="name" placeholder="Name" required>
													</div>
													<div class="col-lg-6 col-12 mb-20">
														<input class="form-control" type="email" id="email" name="email" placeholder="E-mail" required>
													</div>
													<div class="col-lg-6 col-12 mb-20">
														<input class="form-control" type="tel" id="phone_number" name="mobile" placeholder="Phone number" required onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10" >
													</div>
													<div class="col-lg-6 col-12 mb-20">
														<input class="form-control" type="text" id="Subject" name="subject" placeholder="Subject" required>
													</div>
													<div class="col-lg-12 col-12 mb-30">
														<textarea class="form-control" rows="4" id="message" name="message" placeholder=" Your messege here" required></textarea>
													</div>
													<div class="col-lg-12 col-12">
														<button class="type">Submit Now</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
		
		
@endsection	