<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use DB;
use Session;
use Validator;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function index(Request $request){ 

		if($request->ajax()){

			$rules=[
				'id' => 'required|numeric',
				'user_type' => 'required',
				'name' => 'required|string',
				'price' => 'required|numeric',
				'discount' => 'required|numeric',
				'description' => 'required',
				'features' => 'required',
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
							$banner=SubscriptionPlan::where('id',$request->id)->update([
								'name'=>$request->name,
								'price'=>$request->price,
								'discount'=>$request->discount,
								'description'=>$request->description,
								'features'=>$request->features
							]);
							return response(array("error" => false,"reset"=>false,"message" => "Subscription Plan updated successfully."),200);

						}else{
							DB::insert('insert into subscription_plans (user_type,name,price,discount,description,features) values(?,?,?,?,?,?)',[$request->user_type, $request->name, $request->price, $request->discount, $request->description, $request->features]);
							return response(array("error" => false, "reset"=>true,"message" => "Subscription Plan added successfully."),200);
						}
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
		
        return view('admin.subscription-plan.add-subscription-plan')->with('subscriptionplan',array());
    }
}