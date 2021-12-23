@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Tutor </h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Tutor Form</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
	
   
	<div class="container-fluid " style="padding:70px 0" id="form-section">
		<div class="container">
			<div class="row justify-content-center mr-tb-40">
				<div class="col-lg-6">
				<form class="contact-form form-submit"  id="form" action="{{ route('tutor.form.submit' )}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="name" required type="text" class="form-control" placeholder="Name" />
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="mobile" id="mobile" required type="tel" class="form-control" placeholder="Mobile Number" onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10" />
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="email" required type="email" class="form-control" placeholder="Email Id" />
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="subjects" required type="text" class="form-control" placeholder="Subject" />
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="city" required type="text" class="form-control" placeholder="City">
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="pincode" required type="text" class="form-control" placeholder="PinCode">
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="highest_qualification" required type="text" class="form-control" placeholder="Highest Qualication">
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-12">
								<div class="input-group">
									<input name="experience" required type="text" class="form-control" placeholder="Experience">
								</div>
							</div>
							
							<div class="col-md-6 col-sm-3 col-6">
								<div class="btn-block">
									<button class="btn btn-danger"><a href="{{ route('index') }}">Back</a></button>
								</div>
							</div>
							<div class="col-md-6 col-sm-3 col-6">
								<div class="btn-block">
									<button name="submit" type="submit" value="Submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
							
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid d-none" style="padding:70px 0" id="otp-section">
		<div class="container">
			<div class="row justify-content-center mr-tb-40">
				<div class="col-lg-6">
					<form class="contact-form"  id="form" action="{{ route('otp.submit' )}}" method="post" enctype="multipart/form-data">
						@csrf
						<h3 class="pb-4 font-weight-bold">OTP VARIFICATION</h3>

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