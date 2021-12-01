@extends('layouts.app')

@section('content')

     <section class="page-title">
			<div class="container">
				<div class="row clearfix">
					<div class="col-lg-8 col-md-12 col-sm-12 content-column">
						<div class="content-box clearfix">
							<div class="title pull-left">
								<h1>Plans Listing </h1>
							</div>
							<ul class="bread-crumb pull-right clearfix">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>Plans Listing</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		      
			<div class="container-fluid">
			  <div class="container">
				<div class="col-xl-4 col-lg-4 col-lg-4 col-sm-12 col-12">
					 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="products-collection products-collection-1" style="height:430px">
								<div class="item-product mb-30">
									<div class="thumbnail-container">
										<a href="#0"><img src="https://static.hometutorsite.com/content/images/userinfo/female-default-lg.jpg" class="img-fluid frant-img"></a>
									</div>
								</div>
								<div class="product-info">
									<h2>Gayatri Pandya</h2>
								</div>
								<div class="product-pricesss">
									 <span class="product-prices">Age: 41Y, <span>Female, </span></span>
									<span class="price-discount">Exp:10 Y</span> 
								</div>
								<div class="wishlist-quickview">
								 <ul>
									<li>Bhat, Ahmedabad</li>
									<li>MA with Sanskrit</li>
									<li>CBSE calss srkg to 4th ,and ...</li>
									<li>Nursery to 4th all subjects</li>
									</ul>
								</div>
								<div class="add-to-vart d-flex justify-content-center">
									<a href="#0" data-product_id="2" data-product_type="package"
										class="btn btn-to-select add_to_cart" type="submit" value="Submit">
										<i class="fa fa-user"></i>
										<span>View Profile </span>
									</a>
									<a href="#0" data-product_id="2" data-product_type="package"
										class="btn btn-to-select add_to_cart" type="submit" value="Submit">
										<i class="fa fa-user"></i>
										<span>View Profile </span>
									</a>
								</div>
							</div>
						</div>
			  </div>
			 </div>
			</div>
			
@endsection	