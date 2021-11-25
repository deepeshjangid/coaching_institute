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
						<div class="col-lg-6">
							<form class="contact-form"  id="form" action="{{ route('tutor.profile' )}}" method="post" enctype="multipart/form-data">
							    @csrf
								<div class="row">
									<div class="col-md-12 col-sm-12 col-12">
										<div>
											@if($data['profile_image'])
											<img class="mb-5 border rounded-circle" src="{{ asset('/uploads/tutors/profile-images')}}/@if($data){{ $data['profile_image'] }} @endif" style="width:100px; height: 100px;">  
											@else
											<i class="fa fa-user" aria-hidden="true" style="font-size: 100px; margin-bottom: 20px; color: lightslategrey;"></i>
											@endif
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="name" required type="text" class="form-control" placeholder="Name" value="@if($data){{ $data['name'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="mobile" required type="tel" class="form-control" placeholder="Phone Number" value="@if($data){{ $data['mobile'] }}@endif" onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10"/>
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="email" type="email" class="form-control" placeholder="Email Id" value="@if($data){{ $data['email'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="subjects" type="text" class="form-control" placeholder="Subjects Name" value="@if($data){{ $data['subjects'] }}@endif" />
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
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="city" type="text" class="form-control" placeholder="City" value="@if($data){{ $data['city'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="pincode" type="text" class="form-control" placeholder="Pin Code" value="@if($data){{ $data['pincode'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="address" type="text" class="form-control" placeholder="Address" value="@if($data){{ $data['address'] }}@endif" />
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="highest_qualification" type="text" class="form-control" placeholder="Highest Qualification" value="@if($data){{ $data['highest_qualification'] }}@endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="highest_qualification_doc" @if(!$data) @endif type="file" class="form-control" data-image-preview="quadoc" />
										</div>
										<div class="form-group previewimages" id="quadoc">
											@if($data && $data['highest_qualification_doc']!='')
											    <p>{{ $data['highest_qualification_doc'] }}</p>
											@endif	
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="profile_image" @if(!$data) @endif type="file" class="form-control" accept=".png, .jpg, .jpeg" data-image-preview="profileimage" />
										</div>
										<div class="form-group previewimages" id="profileimage">
											@if($data && $data['profile_image']!='')
												<img src="{{ asset('/uploads/tutors/profile-images/'.$data['profile_image']) }}" style="width: 100px;margin-right: 13px" />
											@endif	
										</div>
									</div>

									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="id_proof" @if(!$data) @endif type="file" class="form-control"  accept=".png, .jpg, .jpeg" data-image-preview="idprooofimage"/>
										</div>
										<div class="form-group previewimages" id="idprooofimage">
											@if($data && $data['id_proof']!='')
												<img src="{{ asset('/uploads/tutors/id-proofs/'.$data['id_proof']) }}" style="width: 100px;margin-right: 13px" />
											@endif	
										</div>
									</div>

									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="occupation" type="text" class="form-control" placeholder="Occupation" value="@if($data){{ $data['occupation'] }}@endif"/>
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6 col-12">
										<div class="btn-block">
											<button name="submit" type="submit" value="Submit" class="btn btn-primary" disabled>Update</button>
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
		