
@extends('layouts/master')

@section('title',__('Subscription Plan List'))
@section('data',__('active'))
@section('PurchagePlans',__('active'))

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
                        <i class="fa fa-list">Purchage Subscription Plans</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
										<th>User Name</th>
										<th>Plan Name</th>
										<th>Price</th>
										<th>Points</th>
										<th>Order Id</th>
										<th>Transaction Id</th>
										<th>Payment</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($datas)
                                    @php $count="1"; @endphp
                                    @foreach($datas as $key=>$data)
                                    <tr>
                                        <td>{{$count}}</td>
										<td>{{$data['user']['name']}}</td>
										<td>{{$data['subscriptionplan']['name']}}</td>
										<td>{{$data['amount']}}</td>
										<td>{{$data['points']}}</td>
										<td>{{$data['order_id']}}</td>
										<td>{{$data['transaction_id']}}</td>
										<td>
                                            @if($data['status'] == '0') Failed
                                            @elseif($data['status'] == '1') Success
                                            @elseif($data['status'] == '2') Pending
                                            @endif
                                        </td>
										<td><a class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#addModal{{$data['id']}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            <a class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#minusModal{{$data['id']}}"><i class="fa fa-minus" aria-hidden="true"></i></td>
                                    </tr>
                                    @php $count++; @endphp
                                     <!-- Modal -->
                                     <div class="modal fade" id="addModal{{$data['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="font-weight-bold">Total Points : {{$data['points']}}</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('admin/subscription-plan/points')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <label for="inputEmail3" class="form-control-label">Add Points</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                            <input type="hidden" class="form-control"  value=" @if($data){{$data['id']}}@endif" name="id" >
                                                            <input type="hidden" class="form-control"  value="add" name="type" >
                                                            <input type="hidden" class="form-control"  value="@if($data){{$data['points']}}@endif" name="total_points" >
                                                            <input type="hidden" class="form-control"  value="@if($data){{$data['amount']}}@endif" name="price" >
                                                            <input type="hidden" class="form-control"  value="@if($data){{$data['user_id']}}@endif" name="user_id" >
                                                            <input type="hidden" class="form-control"  value="@if($data){{$data['subscription_plan_id']}}@endif" name="plan_id" >
                                                            <input @if(!isset($data)) required @endif type="number" class="form-control" name="add_point" placeholder="Enter point to add" required>
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <label for="inputEmail3" class="form-control-label">Reason</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                            <textarea @if(!isset($data)) required @endif type="" class="form-control" name="reason" placeholder="Enter reason" required></textarea>
                                                            </div>
                                                        
                                                        </div>

                                                        <div class="form-group row">
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
                                     <!-- Modal -->
                                     <div class="modal fade" id="minusModal{{$data['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="font-weight-bold">Total Points : {{$data['points']}}</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('admin/subscription-plan/points')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <label for="inputEmail3" class="form-control-label">Detect Points</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                            <input type="hidden" class="form-control"  value=" @if($data){{$data['id']}}@endif" name="id" >
                                                            <input type="hidden" class="form-control"  value="minus" name="type" >
                                                            <input type="hidden" class="form-control"  value="@if($data){{$data['points']}}@endif" name="total_points" >
                                                            <input type="hidden" class="form-control"  value="@if($data){{$data['user_id']}}@endif" name="user_id" >
                                                            <input type="hidden" class="form-control"  value="@if($data){{$data['subscription_plan_id']}}@endif" name="plan_id" >

                                                            <input @if(!isset($data)) required @endif type="number" class="form-control" name="minus_point" placeholder="Enter point to detect" required>
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <label for="inputEmail3" class="form-control-label">Reason</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                            <textarea @if(!isset($data)) required @endif type="" class="form-control" name="reason" placeholder="Enter reason" required></textarea>
                                                            </div>
                                                        
                                                        </div>

                                                        <div class="form-group row">
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


