@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Login</h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="#0">Home</a></li>
								<li>Login</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
	
   <div class="container-fluid account-page">
		<div class="content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
									  <img alt="" src="{{ asset('assets/images/login-banner.png') }}" class="img-fluid">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3 style="text-align:center;">Login </h3>
										</div>
										<form action="index.html">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" />
												<label class="focus-label">Mobile Number</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="text-center dont-have">Don’t have an account? <a href="i#0">Register</a></div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 ">
								<div class="account-content">
							<div class="row align-items-center justify-content-center">
							<div class="col-md-7 col-lg-6 login-left">
								 <img alt="" src="{{ asset('assets/images/login-banner.png') }}" class="img-fluid">
							</div>
							<div class="col-md-12 col-lg-6 login-right">
							<div class="login-header">
							<h3>OTP</h3>
							<p class="small text-muted">Enter your Mobile  Number to get a password reset</p>
							</div>

							<form action="#0">
							<div class="form-group form-focus">
								 <input type="text" class="form-control floating">
								<label class="focus-label">Otp</label>
								</div>
								<div class="text-right">
								<a class="forgot-link" href="#0">Remember your password?</a>
								</div>
								<button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Reset Password</button>
							</form>

							</div>
							</div>
							</div>

						</div>
						</div>
					
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

									<form action="instructors-dashboard.html">
										<div class="form-group form-focus">
											<input type="text" class="form-control floating" />
											<label class="focus-label">Name</label>
										</div>
										<div class="form-group form-focus">
											<input type="text" class="form-control floating" />
											<label class="focus-label">Mobile Number</label>
										</div>
										<div class="form-group form-focus">
											<input type="text" class="form-control floating" />
											<label class="focus-label">Email ID</label>
										</div>
										<div class="form-group form-focus">
											<input type="text" class="form-control floating" />
											<label class="focus-label">Subject </label>
										</div>
										<div class="form-group form-focus">
											<input type="text" class="form-control floating" />
											<label class="focus-label">City </label>
										</div>
										
										<div class="form-group form-focus">
											<input type="text" class="form-control floating" />
											<label class="focus-label">Pincode </label>
										</div>
									
									
										<button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Signup</button>
										<div class="login-or">
											<span class="or-line"></span>
											<span class="span-or">or</span>
										</div>
										
											<div class="text-right">
											<a class="forgot-link" href="#0">Already have an account?</a>
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
			
@endsection	