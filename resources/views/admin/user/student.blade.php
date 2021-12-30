@extends('layouts/master')
@section('title',__('All Students'))
@section('User',__('active'))
@section('Students',__('active'))
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
                        <i class="fa fa-list"> Students List</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Subjects</th>
										<th>City</th>
										<th>Gender</th>
										<th>Address</th>
										<th>School/College/Job Name</th>
										<th>Father's/Mother's Name</th>
										<th>Profile Image</th>
										<th>Remark</th>
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
										<td>{{$data->subjects}}</td>
										<td>{{$data->city}}</td>
										<td>{{$data->gender}}</td>
										<td>{{$data->address}}</td>
										<td>{{$data->institute_name}}</td>
										<td>{{$data->parents_name}}</td>
										<td>
                                            <img src="{{ asset('/uploads/students')}}/{{$data->profile_image}}" style="width:50px">  
                                        </td>
										<td>{{$data->remark}}</td>
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
