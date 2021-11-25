@extends('layouts/master')

@section('title')
	@if(!empty($subcategory))
		Update
	@else
		Add
	@endif
	Course Sub Category
@endsection
@section('SubCategory',__('active'))
@section('AddSubCategory',__('active'))

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
                            <a class="btn btn-add " href="{{ route('admin.course.sub.category.list') }}">
                                <i class="fa fa-list"></i> Course Sub Category List </a>
                        </div>
                    </div>
				</div>
			</div>
			
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th" ></i> @if($subcategory) Update @else Add @endif Course Sub Category
                    </div>
                    <div class="panel-body">
                        <form id="form" action="{{route('admin.course.sub.category.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="id" value="@if($subcategory) {{ $subcategory->id }} @else 0 @endif" required />
                       
                            <div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Course Category</label>
								</div>
								<div class="col-md-10">
									<select required name="category_id" id="category_id" class="form-control c-select">
										<option value="">Select Course Category</option>
										@if(!empty($categories))
											@foreach($categories as $cat)
												<option value="{{$cat->id}} " @if($subcategory)(@if($subcategory->category_id == $cat->id)  selected @endif @endif>{{$cat->name}} </option>
											@endforeach
										@else
											<option value="">Data not found </option>
										@endif
									</select>
								</div> 
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="inputEmail3" class="form-control-label">Name</label>
								</div>
								<div class="col-md-10">
									<input required type="text" id="name" class="form-control"  value="@if($subcategory){{ $subcategory->name }}@endif"
                                    name="name" required placeholder="Enter course sub category name">
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