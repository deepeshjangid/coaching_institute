@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Student </h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="#0">Home</a></li>
								<li>Student Form</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
	  <div class="container-fluid " style="padding:70px 0">
				<div class="container">
					<div class="row justify-content-center mr-tb-40">
						<div class="col-lg-6">
							<form class="contact-form" id="form" action="#0" method="post">
								<input type="hidden" name="_token" value="" />
								<div class="row">
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="first_name" required="" type="text" class="form-control" placeholder="Name" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="last_name" required="" type="text" class="form-control" placeholder="Mobile Number" />
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="last_name" required="" type="email" class="form-control" placeholder="Email Id" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="dob" required="" type="date" class="form-control" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12 d-flex">
										<div class="input-group gender-input">
											<label>Gender</label>
											<label for="male"> <input id="male" style="margin-right: 10px !important;" required="" type="radio" name="gender" value="M" checked="" />Male </label>
											<label for="female">
												<input id="female" name="gender" value="F" style="margin-right: 10px !important;" required="" type="radio" />
												Female
											</label>
											<label for="female">
												<input id="female" name="gender" value="O" style="margin-right: 10px !important;" required="" type="radio" />
												Other
											</label>
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="text" required="" type="text" class="form-control" placeholder="Subject" />
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="text" required="" type="text" class="form-control" placeholder="City">
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="text" required="" type="text" class="form-control" placeholder="PinCode">
										</div>
									</div>
									
									<div class="col-md-12 col-sm-6 col-12">
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


			
@endsection	