<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use DB;
use Session;
use Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){ 

		if($request->ajax()){

			$rules=[
				'id' => 'required|numeric',
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
							Category::where('id',$request->id)->update([
								'name'=>$request->name,
							]);
							return response(array("error" => false,"reset"=>false,"message" => "Category updated successfully."),200);

						}else{
							DB::insert('insert into categories (name) values(?)',[$request->name]);
							return response(array("error" => false, "reset"=>true,"message" => "Category added successfully."),200);
						}
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
		
        return view('admin.course-category.add-course-category')->with('category',array());
    }

    public function update($id){
		
		$category=Category::where('id',$id)->first();
	
		if(!$category){
			$request->session()->flash('error','Something went wrong.please try again.');
			return redirect()->back();
		}
		
		return view('admin.course-category.add-course-category')->with(compact('category'));
	}

	public function show()
    {
		$categories = Category::where('delete_status','1')->get();
        return view('admin.course-category.course-category')->with('categories',$categories);
    }

    public function destroy(Request $request, $id)
    {
		$checkResult=Category::find($id);
		
		if($checkResult){
			Category::where('id',$id)->delete();
			$request->session()->flash('success','Category deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->back();

    }

    public function changeStatus(Request $request){
		
		Category::where('id',$request->id)->update(['status'=>$request->status]);
		
		return response(array('success'=>'Category status changed successfully.'),200);
	}
}
