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
									<h3> Register</h3>
								</div>
								<form id="form" action="{{ route('register.submit') }}" method="post">
                                    @csrf
									<div class="form-group form-focus">
                                        <select class="form-control" name="user_type" required>
                                            <option value="">Select option</option>
                                            <option value="1">Student</option>
                                            <option value="2">Tutor</option>
                                            <option value="3">Coaching/Institute</option>
                                        </select>
									</div>

									<div class="form-group form-focus">
                                        <select class="form-control" name="category" id="category_id" required>
                                            <option value="" selected>Select Category</option>
											@if($categories)
											@foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
											@endforeach
											@endif
                                        </select>
									</div>

									<div class="form-group form-focus">
                                        <select class="form-control" name="sub_category" id="sub_category_id" required>
                                            <option value="" selected>Select Sub Category</option>
                                        </select>
									</div>

									<div class="form-group form-focus">
                                        <select class="form-control" name="course" id="course_id" required>
                                            <option value="" selected>Select Course</option>
                                        </select>
									</div>
									
									<div class="form-group form-focus">
										<input type="text" name="name" class="form-control floating" placeholder="Name" required/>
									</div>
									
									<div class="form-group form-focus">
										<input type="tel" name="mobile" class="form-control floating" placeholder="Mobile" required onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10"/>
									</div>
									
									<div class="form-group form-focus">
										<input type="email" name="email" class="form-control floating" placeholder="Eamil Id" required/>
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
			
@endsection	
