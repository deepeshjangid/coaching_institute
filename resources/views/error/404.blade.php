	@extends('layouts.app')

	@section('title')
	Page Not Found
	@endsection
	@section('content')
	<!----- 404 Section   --->
	<div class="container-fluid" id="sec-notfound">
	    <div class="container" style="padding-top:50px;padding-bottom:50px">
	        <div class="row justify-content-center">
	            <div class="col-xl-9">
	                <div class="row">
	                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-6 col-12">
	                        <div class="content-404">
	                            <h1 class="heading">OOPS!</h1>
	                            <h3>I THINK I AM LOST</h3>
	                            <p>Sorry, we can't find the page you're looking for.<br> While we look into it..</p>
	                            <a href="{{url('/')}}" class="back-btn btn btn-warning"> Back to home</a>
	                        </div>
	                    </div>
	                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	                        <div class="imgSec">
	                            <div class="icon">
	                                <div class="victor"></div>
	                                <div class="animation-help"><img src="{{asset('images/404.png')}}" style="width: 500px;"></div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endsection
	
	