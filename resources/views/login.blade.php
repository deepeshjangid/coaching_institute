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
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Login</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
	
   <div class="container-fluid account-page">
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
									<h3> Login</h3>
								</div>
								<form id="form" action="{{ route('login.submit') }}" method="post">
									@csrf
									<div class="form-group form-focus">
										<input type="tel" name="mobile" class="form-control floating" placeholder="Mobile" required onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10"/>
									</div>
									
									<div class="form-group form-focus">
										<input type="password" name="password" class="form-control floating" placeholder="Password" required/>
									</div>

								    <button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Login</button>
									<div class="login-or">
										<span class="or-line"></span>
										<span class="span-or">or</span>
									</div>
									
										<div class="text-right">
										<a class="forgot-link" href="{{ route('register') }}">Don't have any account?</a>
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