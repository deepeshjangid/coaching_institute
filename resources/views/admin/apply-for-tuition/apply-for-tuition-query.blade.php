
@extends('layouts/master')

@section('title',__('Apply For Tuition Query List'))
@section('data',__('active'))
@section('ApplyQueryList',__('active'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">

			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list">Apply For Tuition Query List</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
										<th>Student Name</th>
										<th>Student Mobile Number</th>
										<th>Tutor Name</th>
										<th>Tutor Mobile Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($datas)
                                    @php $count="1"; @endphp
                                    @foreach($datas as $key=>$data)
                                    <tr>
                                        <td>{{$count}}</td>
										<td>{{$data['UserStudent']['name']}}</td>
										<td>{{$data['UserStudent']['mobile']}}</td>
										<td>{{$data['UserTutor']['name']}}</td>
										<td>{{$data['UserTutor']['mobile']}}</td>
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


