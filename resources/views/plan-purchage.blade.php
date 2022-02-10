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

		<section class="ticket-price container-fluid pd-50">
			<div class="container">
				<div class="row justify-content-center mr-tb-40">
					<div class="col-md-6 col-sm-6 col-xs-12 pricing-column">
						<div class="single-ticket">
							<div class="inner-box p-0">
								<div class="plan-header btn-bg-2">
								<h2 class="plan-price">₹ {{$plan->price}}</h2>
									<div class="plan-duration">{{$plan->name}}</div>
								</div>
								{!! $plan->features !!}
								<form class="contact-form p-2" action="{{ route('make.payment') }}" method="POST" style="box-shadow: none; background: none;">
									@csrf
									<div class="row">
										<input name="plan_id" required type="hidden" class="form-control" value="@if($plan_id) {{ $plan_id }} @endif" />
									<!-- 								
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
										</div> -->

										<input name="plan_name" type="hidden" class="form-control" value="@if($plan) {{ $plan->name }} @endif" />
										<input name="amount" type="hidden" class="form-control" value="@if($price) {{ $price }} @else 0 @endif" />
										
									</div>
									@if($price > 0)
									<script
										src="https://checkout.razorpay.com/v1/checkout.js"
										data-key={{env('RAZORPAY_KEY')}}
										data-amount="@if($price) {{$price}}00 @endif"
										data-currency="INR"
										data-buttontext="Pay @if($price) {{$price}} Rs. @endif"
										data-name="Pay"
										data-description="Razorpay"
										data-image="https://example.com/your_logo.jpg"
										data-prefill.name="Coaching"
										data-prefill.email="info@example.com"
										data-theme.color="#fe702a">
									</script>
									@else
									<button type="submit" class="btn-style-two color-1">Purchase</button>
									@endif
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			
@endsection	