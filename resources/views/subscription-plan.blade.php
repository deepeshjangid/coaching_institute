@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Subscription Plans </h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Subscription Plans</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		        @php
					$user_type = Session::get('user_type');
				@endphp
                @if($user_type && $user_type == '1')
                <section class="ticket-price pd-50">
					<div class="container">
						<div class="section-title center"><h2> Students Subscription Plans</h2></div>
					    	<div class="row row-25 clearfix">
                            @foreach($students_plans as $key => $plan)
							<div class="col-md-4 col-sm-6 col-xs-12 pricing-column">
								<div class="single-ticket">
									<div class="inner-box">
										<div class="plan-header btn-bg-{{$key+1}}">
											<h2 class="plan-price">₹ {{$plan->price}}</h2>
											<div class="plan-duration">{{$plan->name}}</div>
										</div>
                                        {!! $plan->features !!}
                                        <form action="{{ route('plan.purchage' )}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$plan->id}}">
                                        <input type="hidden" name="price" value="{{$plan->price}}">
										<button type="submit" class="btn-style-two color-{{$key+1}}">Select</button>
                                        </form>
                                    </div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				</section>
                @elseif($user_type && $user_type == '2')
                <section class="ticket-price">
					<div class="container">
						<div class="section-title center"><h2> Tutors Subscription Plans</h2></div>
					    	<div class="row row-25 clearfix">
                            @foreach($tutors_plans as $key => $plan)
							<div class="col-md-4 col-sm-6 col-xs-12 pricing-column">
								<div class="single-ticket">
									<div class="inner-box">
										<div class="plan-header btn-bg-{{$key+1}}">
                                        <h2 class="plan-price">₹ {{$plan->price}}</h2>
											<div class="plan-duration">{{$plan->name}}</div>
										</div>
                                        {!! $plan->features !!}
                                        <form action="{{ route('plan.purchage' )}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$plan->id}}">
                                        <input type="hidden" name="price" value="{{$plan->price}}">
										<button type="submit" class="btn-style-two color-{{$key+1}}">Select</button>
                                        </form>
                                    </div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				</section>
                @elseif($user_type && $user_type == '3')
                <section class="ticket-price">
					<div class="container">
						<div class="section-title center"><h2> Coaching/ Institutes Subscription Plans</h2></div>
					    	<div class="row row-25 clearfix">
                            @foreach($institutes_plans as $key => $plan)
							<div class="col-md-4 col-sm-6 col-xs-12 pricing-column">
								<div class="single-ticket">
									<div class="inner-box">
										<div class="plan-header btn-bg-{{$key+1}}">
										<h2 class="plan-price">₹ {{$plan->price}}</h2>
											<div class="plan-duration">{{$plan->name}}</div>
										</div>
										{!! $plan->features !!}
                                        <form action="{{ route('plan.purchage' )}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$plan->id}}">
                                        <input type="hidden" name="price" value="{{$plan->price}}">
										<button type="submit" class="btn-style-two color-{{$key+1}}">Select</button>
                                        </form>
									</div>
								</div>
							</div>
                            @endforeach

						</div>
					</div>
				</section>
				@else
				<section class="ticket-price">
					<div class="container">
						<div class="section-title center"><h2> Students Subscription Plans</h2></div>
					    	<div class="row row-25 clearfix">
                            @foreach($students_plans as $key => $plan)
							<div class="col-md-4 col-sm-6 col-xs-12 pricing-column">
								<div class="single-ticket">
									<div class="inner-box">
										<div class="plan-header btn-bg-{{$key+1}}">
											<h2 class="plan-price">₹ {{$plan->price}}</h2>
											<div class="plan-duration">{{$plan->name}}</div>
										</div>
                                        {!! $plan->features !!}
                                        <form action="{{ route('plan.purchage' )}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$plan->id}}">
                                        <input type="hidden" name="price" value="{{$plan->price}}">
										<button type="submit" class="btn-style-two color-{{$key+1}}">Select</button>
                                        </form>
                                    </div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				</section>
				<section class="ticket-price">
					<div class="container">
						<div class="section-title center"><h2> Tutors Subscription Plans</h2></div>
					    	<div class="row row-25 clearfix">
                            @foreach($tutors_plans as $key => $plan)
							<div class="col-md-4 col-sm-6 col-xs-12 pricing-column">
								<div class="single-ticket">
									<div class="inner-box">
										<div class="plan-header btn-bg-{{$key+1}}">
                                        <h2 class="plan-price">₹ {{$plan->price}}</h2>
											<div class="plan-duration">{{$plan->name}}</div>
										</div>
                                        {!! $plan->features !!}
                                        <form action="{{ route('plan.purchage' )}}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                        <input type="hidden" name="id" value="{{$plan->id}}">
                                        <input type="hidden" name="price" value="{{$plan->price}}">
										<button type="submit" class="btn-style-two color-{{$key+1}}">Select</button>
                                        </form>
                                    </div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				</section>
				<section class="ticket-price">
					<div class="container">
						<div class="section-title center"><h2> Coaching/ Institutes Subscription Plans</h2></div>
					    	<div class="row row-25 clearfix">
                            @foreach($institutes_plans as $key => $plan)
							<div class="col-md-4 col-sm-6 col-xs-12 pricing-column">
								<div class="single-ticket">
									<div class="inner-box">
										<div class="plan-header btn-bg-{{$key+1}}">
										<h2 class="plan-price">₹ {{$plan->price}}</h2>
											<div class="plan-duration">{{$plan->name}}</div>
										</div>
										{!! $plan->features !!}
                                        <form action="{{ route('plan.purchage' )}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$plan->id}}">
                                        <input type="hidden" name="price" value="{{$plan->price}}">
										<button type="submit" class="btn-style-two color-{{$key+1}}">Select</button>
                                        </form>
									</div>
								</div>
							</div>
                            @endforeach

						</div>
					</div>
				</section>
				@endif
			
@endsection	