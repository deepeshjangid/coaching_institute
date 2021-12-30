@extends('layouts/master')
@section('title',__('All Tutors'))
@section('User',__('active'))
@section('Tutors',__('active'))
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
                        <i class="fa fa-list"> Tutors List</i>
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
										<th>Pincode</th>
										<th>Address</th>
										<th>Fee</th>
										<th>Gender</th>
										<th>Highest Qualification</th>
										<th>Occupation</th>
										<th>Profile Image</th>
										<th>Id Proof</th>
										<th>Doc</th>
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
										<td>{{$data->pincode}}</td>
										<td>{{$data->address}}</td>
										<td>{{$data->fee}}</td>
										<td>{{$data->gender}}</td>
										<td>{{$data->highest_qualification}}</td>
										<td>{{$data->occupation}}</td>
										<td>
                                            <img src="{{ asset('/uploads/tutors/profile-images')}}/{{$data->profile_image}}" style="width:50px">  
                                        </td>
                                        <td>
                                            <img src="{{ asset('/uploads/tutors/id-proofs')}}/{{$data->id_proof}}" style="width:50px">  
                                        </td>
                                        <td>
                                            <img src="{{ asset('/uploads/tutors/id-proofs')}}/{{$data->id_proof}}" style="width:50px">  
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
