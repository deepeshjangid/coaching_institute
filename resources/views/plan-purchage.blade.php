@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Plan Purchage </h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Plan Purchage</li>
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
						<form class="contact-form" action="{{ route('make.payment' )}}" method="post" enctype="multipart/form-data">
                                @csrf
								<div class="row">
									<input name="plan_id" required type="hidden" class="form-control" value="@if($plan_id) {{ $plan_id }} @endif" />
                                  
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="name" required type="text" class="form-control" placeholder="Name" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="mobile" required type="tel" class="form-control" placeholder="Mobile Number" onkeypress="return /[0-9 ]/i.test(event.key)" pattern="^\d{10}$" min="10" maxLength="10" />
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="services" required type="text" class="form-control" placeholder="Services" />
										</div>
									</div>
                                    <div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="plan_name" readonly type="text" class="form-control" value="@if($plan) {{ $plan->name }} @endif" />
										</div>
									</div>
                                    <div class="col-md-12 col-sm-12 col-12">
										<div class="input-group">
											<input name="amount" readonly type="text" class="form-control" value="@if($price) {{ $price }} @endif" />
										</div>
									</div>
									<div class="col-md-12 col-sm-6 col-12">
										<div class="btn-block">
											<button name="submit" type="submit" value="Submit" class="btn btn-primary">Payment</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			
@endsection	