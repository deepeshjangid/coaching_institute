
@extends('layouts/master')

@section('title',__('Contact Us List'))
@section('ContactUs',__('active'))
@section('ContactUsList',__('active'))
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
                            <a class="btn btn-add " href="{{ route('admin.contact.add')}}">
                                <i class="fa fa-plus"></i> Add Contact </a>
                        </div>
                    </div>
				</div>
			</div>

			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"> Contact Us List</i>
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
										<th>Subject</th>
										<th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($rows)
                                    @php $count="1"; @endphp
                                    @foreach($rows as $key=>$row)
                                    <tr>
                                        <td>{{$count}}</td>
										<td>{{$row->name}}</td>
										<td>{{$row->email}}</td>
										<td>{{$row->mobile}}</td>
										<td>{{$row->subject}}</td>
										<td>{{$row->message}}</td>
									
                                        
                                        <td>
                                            <a href="{{url('admin/contact-us/delete')}}/{{$row->id}}" onclick="return confirm('Are you sure? you want to delete.')"
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


