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
								<form action="#0">
									<div class="form-group form-focus">
									  <select class="form-control" >
										<option>Select option</option>
										<option>Student</option>
										<option>Tutor</option>
										<option>Coaching/Institute</option>
									  </select>
									</div>
									
									<div class="form-group form-focus">
										<input type="text" class="form-control floating" placeholder="Name"/>
									</div>
									
									<div class="form-group form-focus">
										<input type="text" class="form-control floating" placeholder="Mobile"/>
									</div>
									
									<div class="form-group form-focus">
										<input type="eamil" class="form-control floating" placeholder="Eamil Id"/>
									</div>
									
									<div class="form-group form-focus">
										<input type="text" class="form-control floating" placeholder="Password"/>
									</div>
									
									
									
								 <button class="btn btn-primary btn-block btn-lg login-btn w-100" type="submit">Login</button>
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