
@extends('layouts/master')

@section('title',__('Course Category List'))
@section('Category',__('active'))
@section('CategoryList',__('active'))
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
                            <a class="btn btn-add " href="{{ route('admin.course.category.add')}}">
                                <i class="fa fa-plus"></i> Add Course Category </a>
                        </div>
                    </div>
				</div>
			</div>

			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"> Course Category List</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
										<th>Name</th>
										<th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($categories)
                                    @php $count="1"; @endphp
                                    @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{$count}}</td>
										<td>{{$category->name}}</td>
										<td><input data-size="mini" data-id="{{$category->id}}" @if($category->status == "1") checked @endif action="course-category/change-status" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"></td>
                                        
                                        <td><a class="btn btn-add btn-xs" href="{{url('admin/course-category/update')}}/{{$category->id}}"><i
                                                    class="fa fa-pencil"></i> </a>

                                            <a href="{{url('admin/course-category/delete')}}/{{$category->id}}" onclick="return confirm('Are you sure? you want to delete.')"
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


