<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\SubCategory;
use DB;
use Session;
use Validator;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request){ 

		if($request->ajax()){

			$rules=[
				'id' => 'required|numeric',
				'category_id' => 'required',
				'sub_category_id' => 'required',
				'name' => 'required|string'
			];
			
			$validator = Validator::make($request->all(), $rules);

			$response = array("error" => true, "message" => "Something went wrong.please try again"); 
			
			if ($validator->fails()) {
				$message = [];
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				} 
				
				return response(array("error"=>false,"message" => $message),403); 
						
			}else{

				try{
						
						if((int) $request->id >0){
							Course::where('id',$request->id)->update([
								'category_id'=>$request->category_id,
								'sub_category_id'=>$request->sub_category_id,
								'name'=>$request->name,
							]);
							return response(array("error" => false,"reset"=>false,"message" => "Course updated successfully."),200);

						}else{
							DB::insert('insert into courses (category_id,sub_category_id,name) values(?,?,?)',[$request->category_id,$request->sub_category_id,$request->name]);
							return response(array("error" => false, "reset"=>true,"message" => "Course added successfully."),200);
						}
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
		
		$course = array();
		$categories = Category::where('status','1')->where('delete_status','1')->get();
		$subcategories = SubCategory::where('status','1')->where('delete_status','1')->get();
        return view('admin.course.add-course')->with(compact('course','subcategories','categories'));
    }

    public function update($id){
		
		$course=Course::where('id',$id)->first();
		$categories = Category::where('status','1')->where('delete_status','1')->get();
		$subcategories = SubCategory::where('status','1')->where('delete_status','1')->get();

		if(!$course){
			$request->session()->flash('error','Something went wrong.please try again.');
			return redirect()->back();
		}
		
		return view('admin.course.add-course')->with(compact('course','subcategories', 'categories'));
	}

	public function show()
    {
		$courses = Course::with('Category')->with('SubCategory')->where('status','1')->where('delete_status','1')->get();
        return view('admin.course.course')->with('courses',$courses);
    }

    public function destroy(Request $request, $id)
    {
		$checkResult=Course::find($id);
		
		if($checkResult){
			Course::where('id',$id)->delete();
			$request->session()->flash('success','Course deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->back();

    }

    public function changeStatus(Request $request){
		
		Course::where('id',$request->id)->update(['status'=>$request->status]);
		
		return response(array('success'=>'Course status changed successfully.'),200);
	}

	public function Get(Request $request)
    {
		$subcategories = SubCategory::where('category_id', $request->id)->where('status','1')->where('delete_status','1')->get();
		
		$output='';
		$output.='<option value="">Select Course Sub Category</option>';
		
		foreach($subcategories as $subcategory){
			$output.= '<option '; if($request->id==$subcategory->id){ $output.='selected'; } $output.=' value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
		}

		return Response($output);
    }
}
