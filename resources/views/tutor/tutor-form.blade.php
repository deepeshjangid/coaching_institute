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
	
	
	
   
	  <div class="container-fluid " style="padding:70px 0">
				<div class="container">
					<div class="row justify-content-center mr-tb-40">
						<div class="col-lg-6">
						<form class="contact-form"  id="form" action="{{ route('tutor.form.submit' )}}" method="post" enctype="multipart/form-data">
							    @csrf
								<div class="row">
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="name" required type="text" class="form-control" placeholder="Name" />
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