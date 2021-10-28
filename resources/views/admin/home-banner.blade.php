@extends('layouts/master')
@section('title',__('Home Banner | Aakrshan'))
@section('Site Information',__('active'))

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
                            <a class="btn btn-add " href="{{ url('admin/setting/banner') }}">
                                <i class="fa fa-list"></i> Banner List </a>
                        </div>
                    </div>
				</div>
			</div>
			
			<div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th" ></i> Update Home Banner
                    </div>
                    <div class="panel-body">
                        <form id="form" action="{{route('admin.setting.homepage')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="id" value="" required />
                            <div class="form-group">
                                <label for=""> Image 1</label>
								<input type="file" id="inputimg" class="form-control" name="image1" data-type="single" data-image-preview="category_preview1" accept="images/*">
                                <h5 style="color:red"> Image size must be in : 610*405</h5>
								<div class="form-group previewimages" id="category_preview1">
									<img src="{{ asset('uploads/homepage/'.$banner[0]['info_desc']) }}" style="width: 100px;border:1px solid #222;margin-right: 13px" />
								</div>
								<label for=""> URL Image 1</label>
								<input required type="url" name="image1_url" class="form-control" id=""
                                    placeholder="Enter url" value="{{$banner[0]['banner_url']}}">
							</div>
							
							
                            
                            <div class="form-group">
                                <label for=""> Image 2</label>
								<input type="file" id="inputimg" class="form-control" name="image2" data-type="single" data-image-preview="category_preview2"  accept="images/*">
                                <h5 style="color:red"> Image size must be in : 610*405</h5>
								<div class="form-group previewimages" id="category_preview2">
									<img src="{{ asset('uploads/homepage/'.$banner[1]['info_desc']) }}"  style="width: 100px;border:1px solid #222;margin-right: 13px" />	
								</div>
								<label for=""> URL Image 2</label>
								<input required type="url" name="image2_url" class="form-control" id=""
                                    placeholder="Enter url" value="{{$banner[1]['banner_url']}}">
							</div>
							
							
                            <div>
                                <label for=""> Image 3 </label>
								<input type="file" id="inputimg" class="form-control" name="image3"  data-type="single" data-image-preview="category_preview3"  accept="images/*">
                                <h5 style="color:red"> Image size must be in : 1220*4571</h5>
								<div class="form-group previewimages" id="category_preview3">
									<img src="{{ asset('uploads/homepage/'.$banner[2]['info_desc']) }}"  style="width: 100px;border:1px solid #222;margin-right: 13px" />
								</div>
								<label for=""> URL Image 3</label>
								<input required type="url" name="image3_url" class="form-control" id=""
                                    placeholder="Enter url" value="{{$banner[2]['banner_url']}}">
							</div>
							
                            <div class="form-group">
                                <input type="submit" id="inputProjectLeader" class="btn btn-primary">
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