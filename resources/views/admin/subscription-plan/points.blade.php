
@extends('layouts/master')

@section('title',__('Points List'))
@section('data',__('active'))
@section('Points',__('active'))

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
                        <i class="fa fa-list">Points</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
										<th>User Name</th>
										<th>Plan Name</th>
										<th>Points</th>
										<th>Type</th>
										<th>Reason</th>
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
										<td>{{$data['points']}}</td>
										<td>{{$data['type']}}</td>
										<td>{{$data['reason']}}</td>
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


