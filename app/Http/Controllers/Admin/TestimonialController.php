<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use DB;
use Session;
use Validator;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request){ 

		if($request->ajax()){

			$rules=[
				'id' => 'required|numeric',
				'name' => 'required|string',
				'image' => 'mimes:jpeg,jpg,png|max:2048',
				'about' => 'required',
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
						if($request->hasFile('image')) {
							$image = $request->file('image');
							$image_update = rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
							$destinationPath = public_path('/uploads/testimonials');
							$image->move($destinationPath, $image_update);
						}else{
							$image = Testimonial::where('id',$request->id)->first();
							$image_update=$image->image;
						}
						$image=$image_update;
						
						if((int) $request->id >0){
							$banner=Testimonial::where('id',$request->id)->update([
								'name'=>$request->name,
								'image'=>$image_update,
								'about'=>$request->about
							]);
							return response(array("error" => false,"reset"=>false,"message" => "Testimonial updated successfully."),200);

						}else{
							DB::insert('insert into testimonials (name,image,about) values(?,?,?)',[$request->name, $image_update, $request->about]);
							return response(array("error" => false, "reset"=>true,"message" => "Testimonial added successfully."),200);
						}
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
		
        return view('admin.testimonial.add-testimonial')->with('testimonial',array());
    }

    public function update($id){
		
		$testimonial=Testimonial::where('id',$id)->first();
	
		if(!$testimonial){
			$request->session()->flash('error','Something went wrong.please try again.');
			return redirect()->back();
		}
		
		return view('admin.testimonial.add-testimonial')->with(compact('testimonial'));
	}

	public function show()
    {
		$testimonials = Testimonial::where('delete_status','1')->get();
        return view('admin.testimonial.testimonial')->with('testimonials',$testimonials);
    }

    public function destroy(Request $request, $id)
    {
		$checkResult=Testimonial::find($id);
		
		if($checkResult){
			Testimonial::where('id',$id)->delete();
			$request->session()->flash('success','Testimonial deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->back();

    }

    public function changeStatus(Request $request){
		
		Testimonial::where('id',$request->id)->update(['status'=>$request->status]);
		
		return response(array('success'=>'Testimonial status changed successfully.'),200);
	}
}
