@extends('layouts.app')

@section('content')

		<section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>@if($type == "student")
									Students
									@elseif($type == "tutor")
									Tutors
									@elseif($type == "institute")
									Institutes
									@else
									Students Tutors & Institutes
									@endif
								</h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>@if($type == "student")
									Students
									@elseif($type == "tutor")
									Tutors
									@elseif($type == "institute")
									Institutes
									@else
									Students Tutors & Institutes
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		      
			<div class="container-fluid plan-sec">
			  <div class="container">
				<div class="col-xl-4 col-lg-4 col-lg-4 col-sm-12 col-12">
					@if($type == "student")
						@if($rows)
						@foreach($rows as $row)
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="products-collection">
									<div class="item-product mb-30">
										<div class="thumbnail-container">
											@if($row->profile_image != null)
											<img src="{{ asset('uploads/students/'.$row->profile_image) }}" class="img-fluid frant-img">
										    @else
											<img src="https://static.hometutorsite.com/content/images/userinfo/male-default-lg.jpg" class="img-fluid frant-img">
                                            @endif
										</div>
									</div>
									<div class="product-info">
										<h2>{{ $row['User']['name'] }}</h2>
									</div>
									<div class="product-pricesss">
										<span class="product-prices">Age: 41Y, </span><span>{{ $row->gender }} </span></span>
									</div>
									<div class="wishlist-quickview">
									<ul>
										@if($row->address)<li> <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $row->address }}, {{ $row->city }}</li>@endif
										@if($row->institute_name)<li><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{ $row->institute_name }}</li>@endif
										@if($row->parents_name)<li><i class="fa fa-male" aria-hidden="true"></i>{{ $row->parents_name }}</li>@endif
										@if($row->subjects)<li><i class="fa fa-book" aria-hidden="true"></i> {{ $row->subjects }}</li>@endif
									</ul>
									</div>
									<div class="add-to-vart d-flex justify-content-center">
										<a href="{{ url('user-profile/'.$type. '/' . $row->id) }}" data-user_id="2" data-product_type="package"
											class="btn btn-to-select add_to_cart">
											<i class="fa fa-user"></i>
											<span>View Profile </span>
										</a>
										<a href="#0" class="btn btn-to-select add_to_cart" type="submit" value="Submit">
											<i class="fa fa-graduation-cap" aria-hidden="true"></i>
											<span>Get for Demo</span>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						@else
						Student Not Found.
						@endif
					@elseif($type == "tutor")
						@if($rows)
						@foreach($rows as $row)
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="products-collection">
									<div class="item-product mb-30">
										<div class="thumbnail-container">
											<a href="#0"><img src="https://static.hometutorsite.com/content/images/userinfo/male-default-lg.jpg" class="img-fluid frant-img"></a>
										</div>
									</div>
									<div class="product-info">
										<h2>{{ $row['User']['name'] }}</h2>
									</div>
									<div class="product-pricesss">
										<span class="product-prices">Age: 41Y, </span><span>{{ $row->gender }}, </span></span>
										<span class="price-discount">Exp:10 Y</span> 
									</div>
									<div class="wishlist-quickview">
									<ul>
										<li> <i class="fa fa-map-marker" aria-hidden="true"></i> Bhat, Ahmedabad</li>
										<li><i class="fa fa-graduation-cap" aria-hidden="true"></i> MA with Sanskrit</li>
										<li><i class="fa fa-file" aria-hidden="true"></i>CBSE calss srkg to 4th ,and ...</li>
										<li><i class="fa fa-book" aria-hidden="true"></i> Nursery to 4th all subjects</li>
									</ul>
									</div>
									<div class="add-to-vart d-flex justify-content-center">
										<a href="#0" data-product_id="2" data-product_type="package"
											class="btn btn-to-select add_to_cart" type="submit" value="Submit">
											<i class="fa fa-user"></i>
											<span>View Profile </span>
										</a>
										<a href="#0" class="btn btn-to-select add_to_cart" type="submit" value="Submit">
											<i class="fa fa-graduation-cap" aria-hidden="true"></i>
											<span>Get for Demo</span>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						@else
						Tutors Not Found.
						@endif
					@elseif($type == "institute")
						@if($rows)
						@foreach($rows as $row)
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="products-collection">
									<div class="item-product mb-30">
										<div class="thumbnail-container">
											<a href="#0"><img src="https://static.hometutorsite.com/content/images/userinfo/male-default-lg.jpg" class="img-fluid frant-img"></a>
										</div>
									</div>
									<div class="product-info">
										<h2>{{ $row['User']['name'] }}</h2>
									</div>
									<div class="product-pricesss">
										<span class="product-prices">Age: 41Y, </span><span>{{ $row->gender }}, </span></span>
										<span class="price-discount">Exp:10 Y</span> 
									</div>
									<div class="wishlist-quickview">
									<ul>
										<li> <i class="fa fa-map-marker" aria-hidden="true"></i> Bhat, Ahmedabad</li>
										<li><i class="fa fa-graduation-cap" aria-hidden="true"></i> MA with Sanskrit</li>
										<li><i class="fa fa-file" aria-hidden="true"></i>CBSE calss srkg to 4th ,and ...</li>
										<li><i class="fa fa-book" aria-hidden="true"></i> Nursery to 4th all subjects</li>
									</ul>
									</div>
									<div class="add-to-vart d-flex justify-content-center">
										<a href="#0" data-product_id="2" data-product_type="package"
											class="btn btn-to-select add_to_cart" type="submit" value="Submit">
											<i class="fa fa-user"></i>
											<span>View Profile </span>
										</a>
										<a href="#0" class="btn btn-to-select add_to_cart" type="submit" value="Submit">
											<i class="fa fa-graduation-cap" aria-hidden="true"></i>
											<span>Get for Demo</span>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						@else
						Institutes Not Found.
						@endif

					@endif
				</div>
			 </div>
			</div>
			
@endsection	