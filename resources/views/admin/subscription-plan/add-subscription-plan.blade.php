@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update
	@else
		Add
	@endif
	Subscription Plan
@endsection
@section('SubscriptionPlan',__('active'))
@section('AddSubscriptionPlan',__('active'))

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- Main content -->
    <section class="content">
        <div class="row" style="font-size:18px">
            <!-- Form controls -->
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
						<i class="fa fa-th"></i> Goto
					</div>
					@if($subscriptionplan)
					@if($subscriptionplan->user_type == '1')
					<div class="panel-body">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{ url('admin/subscription-plan/list/1') }}">
                                <i class="fa fa-list"></i> Student Subscription Plans </a>
                        </div>
                    </div>
					@elseif($subscriptionplan->user_type == '2')
					<div class="panel-body">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{ url('admin/subscription-plan/list/2') }}">
                                <i class="fa fa-list"></i> Tutor Subscription Plans </a>
                        </div>
                    </div>
					@elseif($subscriptionplan->user_type == '3')
					<div class="panel-body">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{ url('admin/subscription-plan/list/3') }}">
                                <i class="fa fa-list"></i> Institute Subscription Plans </a>
                        </div>
                    </div>
					@endif
					@endif
				</div>
			</div>
			
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th" ></i> @if($subscriptionplan) Update @else Add @endif Subscription Plan
                    </div>
                    <div class="panel-body">
                        <form id="form" action="{{route('admin.subscriptionplan.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="id" value="@if($subscriptionplan) {{ $subscriptionplan->id }} @else 0 @endif" required />
                       
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">User</label>
								</div>
								<div class="col-md-10">
								@if(!$subscriptionplan)
									<select name="user_type" id="user" class="form-control" required>
										<option value="">Select User</option>
										<option value="1">Student</option>
										<option value="2">Tutor</option>
										<option value="3">Coaching/ Institute</option>
									</select>
								@else
								<input type="text" id="name" class="form-control"  value="@if($subscriptionplan) @if($subscriptionplan->user_type =='1') Student @elseif($subscriptionplan->user_type =='2') Tutor @elseif($subscriptionplan->user_type =='3') Coaching/Institute @endif @endif"
                                    name="user_type" readonly>
								@endif
								</div> 
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Name</label>
								</div>
								<div class="col-md-10">
									<input required type="text" id="name" class="form-control"  value="@if($subscriptionplan){{ $subscriptionplan->name }}@endif"
                                    name="name" required placeholder="Enter subscription plan name">
								</div> 
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Price</label>
								</div>
								<div class="col-md-10">
									<input required type="text" id="price" class="form-control"  value="@if($subscriptionplan){{ $subscriptionplan->price }}@endif"
                                    name="price" required placeholder="Enter subscription plan price">
								</div> 
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Discount</label>
								</div>
								<div class="col-md-10">
									<input required type="text" id="price" class="form-control"  value="@if($subscriptionplan){{ $subscriptionplan->discount }}@endif"
                                    name="discount" required placeholder="Enter subscription plan discount">
								</div> 
							</div>
							
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Description</label>
								</div>
								<div class="col-md-10">
									<textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter subscription plan description">@if($subscriptionplan){{ $subscriptionplan->description }}@endif</textarea>
								</div> 
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Features</label>
								</div>
								<div class="col-md-10">
									<textarea name="features" id="summernote">@if($subscriptionplan){{ $subscriptionplan->features }}@endif</textarea>
								</div> 
							</div>
                            
                            <div class="form-group">
								<div class="col-md-2">
									
								</div>
								<div class="col-md-10">
									<input type="submit" id="inputProjectLeader" class="btn btn-primary" name="Submit">
								</div> 
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection