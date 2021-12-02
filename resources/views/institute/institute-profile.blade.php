@extends('layouts.app')

@section('content') 	 
	   <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Institute Profile</h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Institute Profile</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<div class="container-fluid pd-50">
				<div class="container">
					<div class="row justify-content-center mr-tb-40">
					    <div class="col-md-6">
					     <div class="ticket-price">
					    	<div class="row row-25 clearfix">
								@if($plans)
								@foreach($plans as $plan)
                            	<div class="col-lg-6 col-md-6 col-sm-12 col-12 pricing-column">
									<div class="single-ticket">
									<div class="inner-box">
										<div class="plan-header btn-bg-1">
											<h2 class="plan-price">₹ {{ $plan->amount }}</h2>
											<div class="plan-duration">{{ $plan['SubscriptionPlan']['name'] }}</div>
										</div>
                                        {!! $plan['SubscriptionPlan']['features'] !!}
										</div>
									</div>
								</div>
								@endforeach
								@endif
							</div>
						</div>
					</div>
						
					  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<form class="contact-form"  id="form" action="{{ route('institute.profile' )}}" method="post" enctype="multipart/form-data">
							    @csrf
								<div class="row">
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="name" required type="text" class="form-control" placeholder="Name" value="@if($data){{ $data['name'] }}@endif" />
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="mobile" required type="tel" class="form-control" placeholder="Phone Number" value="@if($data){{ $data['mobile'] }}@endif" onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10"/>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="email" type="email" class="form-control" placeholder="Email Id" value="@if($data){{ $data['email'] }}@endif" />
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="subjects" type="text" class="form-control" placeholder="Subjects Name" value="@if($data){{ $data['subjects'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12 d-flex">
										<div class="input-group gender-input">
											<label>Type</label>
											<label for="coaching"> 
												<input id="coaching" style="margin-right: 10px !important;" type="radio" name="type" value="coaching" @if($data) @if($data['type'] == 'coaching') checked @endif @endif />
												Coaching
											</label>
											<label for="institute">
												<input id="institute" name="type" value="institute" style="margin-right: 10px !important;" type="radio" @if($data) @if($data['type'] == 'institute') checked @endif @endif />
												Institute
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="established_year" type="year" class="form-control" placeholder="Established Year" value="@if($data){{ $data['established_year'] }}@endif" onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{4}$" min="4" maxLength="4"/>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="city" type="text" class="form-control" placeholder="City" value="@if($data){{ $data['city'] }}@endif" />
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="pincode" type="text" class="form-control" placeholder="Pin Code" value="@if($data){{ $data['pincode'] }}@endif" />
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="address" type="text" class="form-control" placeholder="Address" value="@if($data){{ $data['address'] }}@endif" />
										</div>
									</div>
									
									<div class="col-md-12 col-sm-6 col-12">
										<div class="btn-block">
											<button name="submit" type="submit" value="Submit" class="btn btn-primary">Update</button>
										</div>
									</div>
									<!-- <div class="col-md-6 col-sm-6 col-12">
										<div class="btn-block">
											<button name="reset" type="reset" value="reset" class="btn btn-danger">Reset</button>
										</div>
									</div> -->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

	   
	   
			@endsection		
		