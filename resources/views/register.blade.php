@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Register</h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Register</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
	
   	<div class="container-fluid account-page" id="form-section">
     	<div class="container">
		<div class="content">
			<div class="row justify-content-center">
				 <div class="col-md-12">
					<div class="account-content">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-7 col-lg-6 login-left">
								 <img alt="" src="{{ asset('assets/images/login-banner.png') }}" class="img-fluid">
							</div>
							<div class="col-md-12 col-lg-6 login-right">
								<div class="login-header">
									<h3> Register</h3>
								</div>
								<form id="form" class="form-submit" action="{{ route('register.submit') }}" method="post">
                                    @csrf
									<div class="form-group form-focus">
                                        <select class="form-control" name="user_type" required>
                                            <option value="">Select option</option>
                                            <option value="1">Student</option>
                                            <option value="2">Tutor</option>
                                            <option value="3">Coaching/Institute</option>
                                        </select>
									</div>

									<!-- <div class="form-group form-focus">
                                        <select class="form-control" name="category" id="category_id" required>
                                            <option value="" selected>Select Category</option>
											@if($categories)
											@foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
											@endforeach
											@endif
                                        </select>
									</div> -->

									<!-- <div class="form-group form-focus">
                                        <select class="form-control" name="sub_category" id="sub_category_id" required>
                                            <option value="" selected>Select Sub Category</option>
                                        </select>
									</div> -->

									<!-- <div class="form-group form-focus">
                                        <select class="form-control" name="course" id="course_id" required>
                                            <option value="" selected>Select Course/Subject</option>
                                        </select>
									</div> -->
									
									<div class="form-group form-focus">
										<input type="text" name="name" class="form-control floating" placeholder="Name" required/>
									</div>
									
									<div class="form-group form-focus">
										<input type="tel" name="mobile" id="mobile" class="form-control floating" placeholder="Mobile" required onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10"/>
									</div>
									
									<div class="form-group form-focus">
										<input type="email" name="email" class="form-control floating" placeholder="Eamil Id* Optional"/>
									</div>
									
									<div class="form-group form-focus">
										<input type="password" name="password" class="form-control floating" placeholder="Password" required/>
									</div>
									<div class="form-group form-focus">
										<input type="password" name="conform-password" class="form-control floating" placeholder="Conform Password" required/>
									</div>

								    <button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Register</button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{ route('login') }}">Already have an account?</a>
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

	
	<div class="container-fluid d-none" style="padding:70px 0" id="otp-section">
		<div class="container">
			<div class="row justify-content-center mr-tb-40">
				<div class="col-lg-6">
					<form class="contact-form otp-form"  id="form" action="{{ route('otp.submit' )}}" method="post" enctype="multipart/form-data">
						@csrf
						<h3 class="font-weight-bold">OTP VARIFICATION</h3>

						<p id="otpmsg" class="pb-4"></p>

						<div class="row m-0">
							<div class="col-md-12 col-sm-6 col-6 otpContainer" style="flex-direction: row; display: flex;">
									<input name="otp1" id="first" type="text" class="form-control text-center mr-5" maxlength="1" autocomplete="off" required/>
									<input name="otp2" id="second" type="text" class="form-control text-center mr-5" maxlength="1" autocomplete="off" required/>
									<input name="otp3" id="third" type="text" class="form-control text-center mr-5" maxlength="1" autocomplete="off" required/>
									<input name="otp4" id="fourth" type="text" class="form-control text-center" maxlength="1" autocomplete="off" required/>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-6">
								<div class="btn-block">
									<button name="submit" type="submit" value="Submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
							<div class="col-md-12 col-sm-6 col-6 mt-4">
								<a class="otp_resend" id="otp-again">Resend OTP</a><a id="timer_left"></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
			
@endsection	
