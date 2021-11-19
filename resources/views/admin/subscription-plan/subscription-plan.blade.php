
@extends('layouts/master')

@section('title',__('Subscription Plan List'))
@section('SubscriptionPlan',__('active'))
@if($user_type == '1')
@section('StudentSubscriptionPlans',__('active'))
@elseif($user_type == '2')
@section('TutorSubscriptionPlans',__('active'))
@elseif($user_type == '3')
@section('InstituteSubscriptionPlans',__('active'))
@endif
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
						<i class="fa fa-th"></i> Goto
					</div>
					<div class="panel-body">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{ route('admin.subscriptionplan.add')}}">
                                <i class="fa fa-plus"></i> Add Subscription Plan </a>
                        </div>
                    </div>
				</div>
			</div>

			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list">
                        @if($user_type == '1')
                        Student 
                        @elseif($user_type == '2')
                        Tutor
                        @elseif($user_type == '3')
                        Institute
                        @endif
                        Subscription Plans</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
										<th>Name</th>
										<th>Price</th>
										<th>Discount</th>
										<th>Description</th>
										<th>Features</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($subscriptionplans)
                                    @php $count="1"; @endphp
                                    @foreach($subscriptionplans as $key=>$subscriptionplan)
                                    <tr>
                                        <td>{{$count}}</td>
										<td>{{$subscriptionplan->name}}</td>
										<td>{{$subscriptionplan->price}}</td>
										<td>{{$subscriptionplan->discount}}</td>
										<td>{{$subscriptionplan->description}}</td>
										<td>{!!$subscriptionplan->features!!}</td>
									                                        
                                        <td><a class="btn btn-add btn-xs" href="{{url('admin/subscription-plan/update')}}/{{$subscriptionplan->id}}"><i
                                                    class="fa fa-pencil"></i> </a>

                                            <a href="{{url('admin/subscription-plan/delete')}}/{{$subscriptionplan->id}}" onclick="return confirm('Are you sure? you want to delete.')"
                                                class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash-o"></i> </a></td>
                                    </tr>
                                    @php $count++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align:center"> Data not Found</td>
                                    </tr>
                                
                                @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection


