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
									   <h2>Wanted home tutor for Sr. Kg cbse, English maths hindi</h2>
										</div>
										<div class="profile-detailes">
											<label><b>Course</b></label>&nbsp;&nbsp;
											<label>Sr. Kg cbse</label>
											<div class="height-10"></div>
											<label><b>Subject</b></label>&nbsp;&nbsp;
											<label>English maths hindi</label>
											<div class="height-10"></div>
											<label><b>Tuition Type</b></label>&nbsp;&nbsp;
											<label>HomeTuition</label>
											<div class="height-10"></div>
											<label><b>City</b></label>&nbsp;&nbsp;
											<label>Ahmedabad</label>
											<div class="height-10"></div>
											<label><b>Location</b></label>&nbsp;&nbsp;
											<label>Ahmedabad</label>
											<div class="height-10"></div>
											<label><b>Pincode</b></label>&nbsp;&nbsp;
											<label>380008</label>
									   </div>
									  </div>
									  </div>
									  
									  <div class="col-md-3">
										<div class="apply-btn">
										  <a href="#0" class="appy-bnt"> Apply Tuition </a>
									    </div>
									</div>
									
                                   </div>
								
								    <div class="row tuition-preferences">
										<div class="col-md-12">
											<h3 class="public-profile-sub-heading">Preferences</h3>
										</div>
										<div class="col-md-4">
											<h4>Gender</h4>
											<p>Any</p>
										</div>
										<div class="col-md-4">
											<h4>Preferred Time</h4>
											<p>Evening</p>
										</div>
										<div class="col-md-4">
											<h4>Monthly Fee</h4>
											<p>Rs 2500.00</p>
										</div>
								</div>
								
							   <div class="row tuition-preferences">
								<div class="col-md-12">
									<h3 class="public-profile-sub-heading">Tuition Description</h3>
									<p>Wanted home tutor for Sr. Kg cbse, English maths hindi</p>
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