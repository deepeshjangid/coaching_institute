
@extends('layouts/master')

@section('title',__('Testimonial List'))
@section('Testimonial',__('active'))
@section('Testimonials',__('active'))
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
                            <a class="btn btn-add " href="{{ route('admin.testimonial.add')}}">
                                <i class="fa fa-plus"></i> Add Testimonial </a>
                        </div>
                    </div>
				</div>
			</div>

			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"> Testimonial List</i>
                    </div>
			
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
										<th>Name</th>
										<th>Image</th>
										<th>About</th>
										<th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($testimonials)
                                    @php $count="1"; @endphp
                                    @foreach($testimonials as $key=>$testimonial)
                                    <tr>
                                        <td>{{$count}}</td>
										<td>{{$testimonial->name}}</td>
										<td>
                                            <img src="{{ asset('uploads/testimonials')}}/{{$testimonial->image}}" style="width:50px">
                                        </td>
										<td>{{$testimonial->about}}</td>
									
										<td><input data-size="mini" data-id="{{$testimonial->id}}" @if($testimonial->status == "1") checked @endif action="testimonial/change-status" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"></td>
                                        
                                        <td><a class="btn btn-add btn-xs" href="{{url('admin/testimonial/update')}}/{{$testimonial->id}}"><i
                                                    class="fa fa-pencil"></i> </a>

                                            <a href="{{url('admin/testimonial/delete')}}/{{$testimonial->id}}" onclick="return confirm('Are you sure? you want to delete.')"
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


