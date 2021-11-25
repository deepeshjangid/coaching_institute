<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use DB;
use Session;
use Validator;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request){ 

		if($request->ajax()){

			$rules=[
				'id' => 'required|numeric',
				'category_id' => 'required',
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
							SubCategory::where('id',$request->id)->update([
								'category_id'=>$request->category_id,
								'name'=>$request->name,
							]);
							return response(array("error" => false,"reset"=>false,"message" => "Sub Category updated successfully."),200);

						}else{
							DB::insert('insert into sub_categories (category_id,name) values(?,?)',[$request->category_id,$request->name]);
							return response(array("error" => false, "reset"=>true,"message" => "Sub Category added successfully."),200);
						}
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
		
		$subcategory = array();
		$categories = Category::where('status','1')->where('delete_status','1')->get();
        return view('admin.course-sub-category.add-course-sub-category')->with(compact('subcategory','categories'));
    }

    public function update($id){
		
		$subcategory=SubCategory::where('id',$id)->first();
		$categories = Category::where('status','1')->where('delete_status','1')->get();

		if(!$subcategory){
			$request->session()->flash('error','Something went wrong.please try again.');
			return redirect()->back();
		}
		
		return view('admin.course-sub-category.add-course-sub-category')->with(compact('subcategory', 'categories'));
	}

	public function show()
    {
		$subcategories = SubCategory::with('Category')->where('delete_status','1')->get();
        return view('admin.course-sub-category.course-sub-category')->with('subcategories',$subcategories);
    }

    public function destroy(Request $request, $id)
    {
		$checkResult=SubCategory::find($id);
		
		if($checkResult){
			SubCategory::where('id',$id)->delete();
			$request->session()->flash('success','Sub Category deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->back();

    }

    public function changeStatus(Request $request){
		
		SubCategory::where('id',$request->id)->update(['status'=>$request->status]);
		
		return response(array('success'=>'Sub Category status changed successfully.'),200);
	}
}
