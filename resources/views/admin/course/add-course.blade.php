@extends('layouts/master')

@section('title')
	@if(!empty($course))
		Update
	@else
		Add
	@endif
	Course
@endsection
@section('Course',__('active'))
@section('AddCourse',__('active'))

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
                            <a class="btn btn-add " href="{{ route('admin.course.list') }}">
                                <i class="fa fa-list"></i> Course List </a>
                        </div>
                    </div>
				</div>
			</div>
			
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th" ></i> @if($course) Update @else Add @endif Course
                    </div>
                    <div class="panel-body">
                        <form id="form" action="{{route('admin.course.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="id" value="@if($course) {{ $course->id }} @else 0 @endif" required />
                       
                            <div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Category</label>
								</div>
								<div class="col-md-10">
									<select required name="category_id" id="category_id" class="form-control c-select">
										<option value="">Select Course Category</option>
										@if(!empty($categories))
											@foreach($categories as $cat)
												<option value="{{$cat->id}} " @if($course)(@if($course->category_id == $cat->id)  selected @endif @endif>{{$cat->name}} </option>
											@endforeach
										@else
											<option value="">Data not found </option>
										@endif
									</select>
								</div> 
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Sub Category</label>
								</div>
								<div class="col-md-10">
									<select required name="sub_category_id" id="sub_category_id" class="form-control c-select">
										<option value="">Select Course Category</option>
									</select>
								</div> 
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Name</label>
								</div>
								<div class="col-md-10">
									<input required type="text" id="name" class="form-control"  value="@if($course){{ $course->name }}@endif"
                                    name="name" required placeholder="Enter course name">
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

@push('custom_js')
<script>

var courseId=parseInt("<?php if(!empty($course)){ echo $course->sub_category_id; }else{ echo '0'; } ?>");

$('#category_id').on('change', function() {

	var level_one_id = this.value;

	$.ajax({
		url: "{{ url('admin/course/get')}}",
		type: "POST",
		data: {
		id: level_one_id
		},
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		},
		cache: false,
		error:function(xhr,textStatus){

		sweetAlertMsg('error',xhr.responseJSON.message);
		},
		success: function(result){
		    $("#sub_category_id").html(result);

			if(courseId>0){
				$('#sub_category_id').val(courseId);
			}
		}

	});

});

if(courseId>0){
	$('#category_id').trigger('change');
}

</script>
@endpush