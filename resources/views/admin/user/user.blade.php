@extends('layouts/master')
@section('title',__('All Users'))
@section('User',__('active'))
@section('Users',__('active'))
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
				</div>
			</div>

            
			
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"> Users List</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
										<th>Email</th>
										<th>Mobile Number</th>
										<th>Role</th>
										<th>Verify</th>
										<th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($datas)
                                    @php $count="1"; @endphp
                                    @foreach($datas as $data)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$data->name}}</td>
										<td>{{$data->email}}</td>
										<td>{{$data->mobile}}</td>
										<td>
                                            @if($data->user_type == '1')
                                                Student
                                            @endif
                                            @if($data->user_type == '2')
                                                Tutor
                                            @endif
                                            @if($data->user_type == '3')
                                                Institute
                                            @endif
                                        </td>
										<td><input data-size="mini" data-id="{{$data->id}}" @if($data->admin_verify == "1") checked @endif action="user/admin-verify" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No"></td>
										<td><input data-size="mini" data-id="{{$data->id}}" @if($data->status == "1") checked @endif action="user/change-status" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"></td>
                                        
                                        <td>

                                            <a href="{{url('admin/user/delete')}}/{{$data->id}}" onclick="return confirm('Are you sure? you want to delete.')"
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
