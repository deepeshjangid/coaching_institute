@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Coaching / Institute </h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Coaching / Institute Form</li>
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
						<form class="contact-form"  id="form" action="{{ route('institute.form.submit' )}}" method="post" enctype="multipart/form-data">
							    @csrf
								<div class="row">
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="name" required type="text" class="form-control" placeholder="Name Of Institute" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="form-group form-focus">
                                        <select class="form-control" name="type" required>
                                            <option value="">Type </option>
                                            <option value="Coaching">Coaching</option>
                                            <option value="Institute">Institute</option>
                                        </select>
									  </div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="mobile" required type="tel" class="form-control" placeholder="Mobile Number" />
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="email" required type="email" class="form-control" placeholder="Email Id" />
										</div>
									</div>
									
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="form-group form-focus">
                                        <select class="form-control" name="subjects" required>
                                            <option value="0"> Subject / Course</option>
                                            <option value="Coures Name 1">Coures Name 1</option>
                                            <option value="Coures Name 2">Coures Name 2</option>
                                        </select>
									  </div>
									</div>
									
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="established_year" required type="text" class="form-control" placeholder="Established Year">
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="address" required type="text" class="form-control" placeholder="Full Address">
										</div>
									</div>
									
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="city" required type="text" class="form-control" placeholder="City Name ">
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="pincode" required type="text" class="form-control" placeholder="PinCode">
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