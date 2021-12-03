@extends('layouts.app')

@section('content')

		<section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>@if($row){{ $row['User']['name'] }}
									@endif
								</h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>@if($row){{ $row['User']['name'] }}
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		      
			<div class="container-fluid user-profile-signle">
			  <div class="container">
			      <div class="row">
					<div class="col-md-8">
					     <div class="row profiletitle">
							 <div class="col-md-12 ">
							   <div class="row section-headdig">
								 <div class="col-md-9">
								   <div class="col-md-12 p-0">
									<div class="header-profile">
									   <h2>Wanted home tutor for @if($row->subjects){{ $row->subjects }}@endif</h2>
										</div>
										<div class="profile-detailes">
											<label><b>Course</b></label>&nbsp;&nbsp;
											<label>@if($c){{ $c->name }}@endif</label>
											<div class="height-10"></div>
											<label><b>Subjects</b></label>&nbsp;&nbsp;
											<label>@if($row->subjects){{ $row->subjects }}@endif</label>
											<div class="height-10"></div>
											<label><b>Occupation</b></label>&nbsp;&nbsp;
											<label>@if($row->occupation){{ $row->occupation }}@endif</label>
											<div class="height-10"></div>
											<label><b>City</b></label>&nbsp;&nbsp;
											<label>@if($row->city){{ $row->city }}@endif</label>
											<div class="height-10"></div>
											<label><b>Location</b></label>&nbsp;&nbsp;
											<label>@if($row->address){{ $row->address }}@endif</label>
											<div class="height-10"></div>
											<label><b>Pincode</b></label>&nbsp;&nbsp;
											<label>@if($row->pincode){{ $row->pincode }}@endif</label>
									   </div>
									  </div>
									  </div>
									  
									  <div class="col-md-3">
										<div class="apply-btn">
										  <a href="#0" class="appy-bnt"> Apply Tuition </a>
									    </div>
										<form class="contact-form" action="{{ route('apply.for.tution') }}" method="POST" >
											@csrf
											<div class="row">
											</div>
											<script
												src="https://checkout.razorpay.com/v1/checkout.js"
												data-key="rzp_test_el72DFtTI4GCy9"
												data-amount="@if($row->fee){{$row->fee}}00 @endif"
												data-currency="INR"
												data-buttontext="Apply Tuition"
												data-name="Pay"
												data-description="Razorpay"
												data-image="https://example.com/your_logo.jpg"
												data-prefill.name="Coaching"
												data-prefill.email="info@example.com"
												data-theme.color="#F37254">
											</script>
										</form>
									</div>
									
                                   </div>
								
								    <div class="row tuition-preferences">
										<div class="col-md-12">
											<h3 class="public-profile-sub-heading">Preferences</h3>
										</div>
										<div class="col-md-4">
											<h4>Gender</h4>
											<p>@if($row->gender){{ $row->gender }}@endif</p>
										</div>
										<div class="col-md-4">
											<h4>Preferred Time</h4>
											<p>Evening</p>
										</div>
										<div class="col-md-4">
											<h4>Monthly Fee</h4>
											<p>Rs. @if($row->fee){{ $row->fee }}@endif</p>
										</div>
								</div>
								
							   <div class="row tuition-preferences">
								<div class="col-md-12">
									<h3 class="public-profile-sub-heading">Tuition Description</h3>
									<p>Wanted home tutor for @if($row->subjects){{ $row->subjects }}@endif</p>
									<div class="height-10"></div>
								</div>
							</div>
								
							  </div>
							</div>
						
						
						    <div class="col-md-12">
							
							
						 </div>
						</div>
						</div>
				  
				  
					<div class="col-md-4">
						   
					
					
					</div>
				  
				  
				 </div>
				</div>
			  </div>
			</div>
			
@endsection	