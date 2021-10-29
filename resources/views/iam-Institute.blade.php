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
							<form class="contact-form" id="form" action="#0" method="post">
								<input type="hidden" name="_token" value="" />
								<div class="row">
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="first_name" required="" type="text" class="form-control" placeholder="Name Of Institute" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<input type="hidden" name="_token" value="">
										<div class="form-group form-focus">
                                        <select class="form-control" name="user_type" required>
                                            <option value="">Type </option>
                                            <option value="1">Coaching</option>
                                            <option value="2">Institute</option>
                                        </select>
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
										<input type="hidden" name="_token" value="">
										<div class="form-group form-focus">
                                        <select class="form-control" name="user_type" required>
                                            <option value="0"> Subject / Institute</option>
                                            <option value="1">Coures Name 1</option>
                                            <option value="1">Coures Name 2</option>
                                        </select>
									  </div>
									</div>
									
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="text" required="" type="text" class="form-control" placeholder="Established Year">
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="text" required="" type="text" class="form-control" placeholder="Full Address">
										</div>
									</div>
									
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="text" required="" type="text" class="form-control" placeholder="City Name ">
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