@extends('layouts/master')

@section('title')
	@if(!empty($row))
		Update
	@else
		Add
	@endif
	Contact Us Information
@endsection
@section('ContactUs',__('active'))
@section('AddContactUs',__('active'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- Main content -->
    <section class="content">
        <div class="row" style="font-size:18px">
            <!-- Form controls -->
			<div class="col-sm-12">
                <div class="panel panel-bd" >
                <div class="panel-heading">
                        <i class="fa fa-th"></i> Goto
                    </div>
					<div class="panel-body">
                        <div class="btn-group" id="buttonlist" >
                            <a class="btn btn-add " href="{{ route('admin.contact.list') }}">
                                <i class="fa fa-list"></i> Contact Us List </a>
                        </div>
                    </div>
				</div>
			</div>
			
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th" ></i> @if($row) Update @else Add @endif Contact Us Information
                    </div>
                    <div class="panel-body">
                        <form id="form" action="{{route('admin.contact.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="id" value="@if($row) {{ $row->id }} @else 0 @endif" />
                       
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Email Address</label>
								</div>
								<div class="col-md-10">
									<input type="email" id="name" class="form-control"  value="@if($row){{ $row->email }}@endif"
                                    name="email" placeholder="Enter email address">
								</div> 
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Mobile Number</label>
								</div>
								<div class="col-md-10">
									<input type="tel" id="name" class="form-control"  value="@if($row){{ $row->mobile }}@endif"
                                    name="mobile" placeholder="Enter mobile number">
								</div> 
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Address</label>
								</div>
								<div class="col-md-10">
									<textarea name="address" id="about" class="form-control" rows="5" placeholder="Enter address">@if($row){{ $row->address }}@endif</textarea>
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