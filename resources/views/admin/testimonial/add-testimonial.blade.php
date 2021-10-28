@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update
	@else
		Add
	@endif
	Testimonial
@endsection
@section('Testimonial',__('active'))
@section('AddTestimonial',__('active'))

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
                            <a class="btn btn-add " href="{{ route('admin.testimonial.list') }}">
                                <i class="fa fa-list"></i> Testimonial List </a>
                        </div>
                    </div>
				</div>
			</div>
			
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th" ></i> @if($testimonial) Update @else Add @endif Testimonial
                    </div>
                    <div class="panel-body">
                        <form id="form" action="{{route('admin.testimonial.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="id" value="@if($testimonial) {{ $testimonial->id }} @else 0 @endif" required />
                       
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Name</label>
								</div>
								<div class="col-md-10">
									<input required type="text" id="name" class="form-control"  value="@if($testimonial){{ $testimonial->name }}@endif"
                                    name="name" required placeholder="Enter testimonial name">
								</div> 
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Image</label>
								</div>
								<div class="col-md-10">
									<input type="file" id="image" class="form-control"  value="@if($testimonial){{ $testimonial->image }}@endif"
                                    name="image" @if(!$testimonial) required @endif accept=".png, .jpg, .jpeg">
								</div> 
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">About</label>
								</div>
								<div class="col-md-10">
									<textarea name="about" id="about" class="form-control" rows="5" placeholder="Enter testimonial about">@if($testimonial){{ $testimonial->about }}@endif</textarea>
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