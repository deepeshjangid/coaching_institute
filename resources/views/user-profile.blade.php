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
									   <h2>Wanted home tutor for @if($row['subjects']){{ $row['subjects'] }}@endif</h2>
										</div>
										<div class="profile-detailes">
											<div class="height-10"></div>
											<label><b>Subjects</b></label>&nbsp;&nbsp;
											@if($row['subjects'])
												@php $subjects = str_replace(',', ', ',$row['subjects']); @endphp
												<label>{{$subjects}}</label>
											@endif
											<div class="height-10"></div>
											<label><b>Occupation</b></label>&nbsp;&nbsp;
											<label>@if($row['occupation']){{ $row['occupation'] }}@endif</label>
											<div class="height-10"></div>
											<label><b>City</b></label>&nbsp;&nbsp;
											<label>@if($row['city']){{ $row['city'] }}@endif</label>
											<div class="height-10"></div>
											<label><b>Location</b></label>&nbsp;&nbsp;
											<label>@if($row['address']){{ $row['address'] }}@endif</label>
											<div class="height-10"></div>
											<label><b>Pincode</b></label>&nbsp;&nbsp;
											<label>@if($row['pincode']){{ $row['pincode'] }}@endif</label>
									   </div>
									  </div>
									  </div>
									  
									  <div class="col-md-3">
										@if($row['User']['user_type'] == '2' && $applied == '0' && $row['User']['id'] != Session::get('user_id') && $row['fee'] > 0)
										<form class="apply-btn" action="{{ route('apply.for.tution') }}" method="POST" >
											@csrf
											<input type="hidden" name="parent_id" value="@if($row){{ $row['User']['id'] }}@endif">
											<input type="hidden" name="amount" value="@if($row['fee']){{ $row['fee'] }}@endif">
											<script
												src="https://checkout.razorpay.com/v1/checkout.js"
												data-key="rzp_test_el72DFtTI4GCy9"
												data-amount="@if($row['fee']){{$row['fee']}}00 @endif"
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
										@elseif($row['User']['user_type'] == '2' && $applied == '1' && $row['User']['id'] != Session::get('user_id'))
										<div class="apply-btn">
											<a class="apply-bnt"><i class="fa fa-check-circle" aria-hidden="true"></i> Applied</a>
										</div>
										@endif
										@if($row['User']['user_type'] == '2' && $query == '0' && $row['User']['id'] != Session::get('user_id'))
										<div class="apply-btn">
											<a href="{{ url('query-submit/'.$row['User']['id']) }}" class="apply-bnt" style="background: #09618C"><i class="fa fa-phone" aria-hidden="true"></i> Query</a>
										</div>
										@elseif($row['User']['user_type'] == '2' && $query == '1' && $row['User']['id'] != Session::get('user_id'))
										<div class="apply-btn">
											<a class="apply-bnt"><i class="fa fa-check-circle" aria-hidden="true"></i> Submitted</a>
										</div>
										@endif
									</div>
									
                                   </div>
								
								    <div class="row tuition-preferences">
										<div class="col-md-12">
											<h3 class="public-profile-sub-heading">Preferences</h3>
										</div>
										@if($row['gender'])
										<div class="col-md-4">
											<h4>Gender</h4>
											<p>@if($row['gender']){{ $row['gender'] }}@endif</p>
										</div>
										@endif
										@if($row['fee'])
										<div class="col-md-4">
											<h4>Monthly Fee</h4>
											<p>Rs. @if($row['fee']){{ $row['fee'] }}@endif</p>
										</div>
										@endif
								</div>
								
							   <div class="row tuition-preferences">
								<div class="col-md-12">
									<h3 class="public-profile-sub-heading">Tuition Description</h3>
									<p>Wanted home tutor for @if($row['subjects']) {{$subjects}} @endif</p>
									<div class="height-10"></div>
								</div>
							</div>
								
							  </div>
							</div>
						
						
						    <div class="col-md-12">
							
							
						   </div>
						 </div>
					
				  
					   <div class="col-md-4 ">
						  <div class="col-md-12 col-sm-12">
						     <div class="apply-boxs">
								<div class="apply-for-coures">
								   <p>are you a Student / parent</p>
								   <h2>Looking for Student</h2>
								   <img src="{{ asset ('assets/images/demo-icons.png')}}" alt="icons" class="img-fluid">
								   <a href="#0" class="demo-button">post student Needs For Free</a>
							 </div>
						   </div>
						  </div>
						  
						  <div class="col-md-12 col-sm-12">
						     <div class="apply-boxs">
								<div class="apply-for-coures">
								   <p>are you a student / Tutors</p>
								   <h2>Looking for Tutors?</h2>
								   <img src="{{ asset ('assets/images/tutor.png')}}" alt="icons" class="img-fluid">
								   <a href="#0" class="demo-button">post tuition Needs For Free</a>
							 </div>
						   </div>
						  </div>
					   </div>
					  </div>
					  </div>
					 </div>
			
@endsection	