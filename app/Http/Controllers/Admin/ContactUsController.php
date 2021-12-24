<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Session;
use Validator;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request){ 

		if($request->ajax()){

			$rules=[
				'id' => 'required|numeric',
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
							DB::table('contact_us_information')->where('id',$request->id)->update([
								'email'=>$request->email,
								'mobile'=>$request->mobile,
								'address'=>$request->address,
								'facebook'=>$request->facebook,
								'instagram'=>$request->instagram,
								'twitter'=>$request->twitter,
								'github'=>$request->github,
							]);
							return response(array("error" => false,"reset"=>false,"message" => "Contact details updated successfully."),200);

						}else{
							DB::table('contact_us_information')->insert([
								'email'=>$request->email,
								'mobile'=>$request->mobile,
								'address'=>$request->address,
								'facebook'=>$request->facebook,
								'instagram'=>$request->instagram,
								'twitter'=>$request->twitter,
								'github'=>$request->github,
							]);
							return response(array("error" => false, "reset"=>true,"message" => "Contact details added successfully."),200);
						}
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}

		$data=DB::table('contact_us_information')->first();

		if($data){
			$row = $data;
		}else{
			$row = array();
		}
		
        return view('admin.contact.add-contact-information')->with('row', $row);
	}

	public function show()
    {
		$rows = DB::table('contact_us')->get();
        return view('admin.contact.contact-us')->with(['rows' => $rows]);
    }

    public function destroy(Request $request, $id)
    {
		$checkResult=DB::table('contact_us')->where('id',$id)->first();
		
		if($checkResult){
			DB::table('contact_us')->where('id',$id)->delete();
			$request->session()->flash('success','Message deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->back();

    }
}