@extends('layouts.app')

@section('content') 	 
	   <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Tutor Profile</h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Tutor Profile</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		
			<div class="container-fluid " style="padding:70px 0">
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
						<div class="col-lg-6">
							<form class="contact-form"  id="form" action="{{ route('tutor.profile' )}}" method="post" enctype="multipart/form-data">
							    @csrf
								<div class="row">
									<div class="col-md-12 col-sm-12 col-12">
									    <label class="file-attachment-input" style="margin: auto; background: white; width:130px; padding: 0px; border:0px;">
										
										<div class="form-group previewimages" id="profileimage">
											@if($data && $data['profile_image']!='')
												<img class=" border rounded-circle" src="{{ asset('/uploads/tutors/profile-images')}}/@if($data){{ $data['profile_image'] }} @endif" style="width: 100px;height: 100px; object-fit: cover;">  
											@else
												<img src="https://static.hometutorsite.com/content/images/userinfo/male-default-lg.jpg" class="border rounded-circle" style="width: 100px;height: 100px; object-fit: cover;">

											@endif	
										</div>
										<div class="input-group mb-5 font-weight-bold" style="justify-content: center;">
										     Change Profile Photo
											<input name="profile_image" @if(!$data) @endif type="file" class="form-control" accept=".png, .jpg, .jpeg" data-image-preview="profileimage" />
										</div>
										</label>
									</div>
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
											<select multiple="multiple" class="fselect form-control" name="subjects[]">
												@if($courses)

													@php $subjects_array = explode(",",$data['subjects']); @endphp

													@foreach($courses as $par)
														<option value="{{$par->name}}" @if(in_array($par->name, $subjects_array)) selected @endif>{{$par->name}}</option>
													@endforeach
												@endif
												<option value="Other" @if(in_array("Other", $subjects_array)) selected @endif>Other</option>
											</select>
										</div>

									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="fee" type="text" class="form-control" placeholder="Fee" value="@if($data){{ $data['fee'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12 d-flex">
										<div class="input-group gender-input">
											<label>Gender</label>
											<label for="male"> 
												<input id="male" style="margin-right: 10px !important;" type="radio" name="gender" value="Male" @if($data) @if($data['gender'] == 'Male') checked @endif @endif />
												Male
											</label>
											<label for="female">
												<input id="female" name="gender" value="Female" style="margin-right: 10px !important;" type="radio" @if($data) @if($data['gender'] == 'Female') checked @endif @endif />
												Female
											</label>
											<label for="other">
												<input id="other" name="gender" value="Other" style="margin-right: 10px !important;" type="radio" @if($data) @if($data['gender'] == 'Other') checked @endif @endif/>
												Other
											</label>
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
									
									<div class="col-md-6 col-sm-12 col-12">
										<div class="input-group">
											<input name="highest_qualification" type="text" class="form-control" placeholder="Highest Qualification" value="@if($data){{ $data['highest_qualification'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
									   <label class="file-attachment-input">
										<div class="input-group">
										    Browse your upload highest qualification document
											<input name="highest_qualification_doc" @if(!$data) @endif type="file" class="form-control" data-image-preview="quadoc" />
										</div>
										<div class="form-group previewimages" id="quadoc">
											@if($data && $data['highest_qualification_doc']!='')
											    <p>{{ $data['highest_qualification_doc'] }}</p>
											@endif	
										</div>
										</label>
									</div>
									

									<div class="col-md-12 col-sm-12 col-12">
									     <label class="file-attachment-input">
											<div class="input-group">
											    Browse your upload id proof
												<input name="id_proof" @if(!$data) @endif type="file" class="form-control"  accept=".png, .jpg, .jpeg" data-image-preview="idprooofimage"/>
											</div>
											<div class="form-group previewimages" id="idprooofimage">
												@if($data && $data['id_proof']!='')
													<img src="{{ asset('/uploads/tutors/id-proofs/'.$data['id_proof']) }}" style="width: 100px;margin-right: 13px" />
												@endif	
											</div>
										 </label>
									</div>

									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
										  
											<input name="occupation" type="text" class="form-control" placeholder="Occupation" value="@if($data){{ $data['occupation'] }}@endif"/>
										</div>
									</div>

									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<textarea name="remark" id="remark" cols="60" rows="10" placeholder="Remark">@if($data){{ $data['remark'] }}@endif</textarea>
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input type="text" readonly class="form-control" value="Profile Link - @if($data['profile_url']){{ asset($data['profile_url']) }} @else Update Your Profile @endif"/>
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