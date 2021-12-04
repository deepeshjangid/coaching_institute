<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Models\PurchagePlan;
use App\Models\Point;
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

    public function update($id){
		
		$subscriptionplan=SubscriptionPlan::where('id',$id)->first();
	
		if(!$subscriptionplan){
			$request->session()->flash('error','Something went wrong.please try again.');
			return redirect()->back();
		}
		
		return view('admin.subscription-plan.add-subscription-plan')->with(compact('subscriptionplan'));
	}

	public function show($user_type)
    {
		$subscriptionplans = SubscriptionPlan::where('user_type', $user_type)->where('delete_status','1')->get();
        return view('admin.subscription-plan.subscription-plan')->with(['subscriptionplans' => $subscriptionplans, 'user_type'=>$user_type]);
    }

	public function PurchagePlan()
    {
		$datas = PurchagePlan::with('User')->with('SubscriptionPlan')->get();
        return view('admin.subscription-plan.purchage-plans')->with(['datas' => $datas]);
    }
	public function PointsShow()
    {
		$datas = Point::with('User')->with('SubscriptionPlan')->get();
        return view('admin.subscription-plan.points')->with(['datas' => $datas]);
    }

    public function destroy(Request $request, $id)
    {
		$checkResult=SubscriptionPlan::find($id);
		
		if($checkResult){
			SubscriptionPlan::where('id',$id)->delete();
			$request->session()->flash('success','Subscription Plan deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->back();

    }

    public function changeStatus(Request $request){
		
		SubscriptionPlan::where('id',$request->id)->update(['status'=>$request->status]);
		
		return response(array('success'=>'Subscription Plan status changed successfully.'),200);
	}

	public function Points(Request $request)
    {
		if($request->type == "add"){
			$points = $request->total_points + $request->add_point;

			if($request->price >= $points){
				PurchagePlan::where('id', $request->id)->update(['points'=>$points]);
				DB::table('points')->insert([
                    'user_id' => $request->user_id,
                    'subscription_plan_id' => $request->plan_id,
                    'points' => $request->add_point,
                    'type' => $request->type,
                    'reason' => $request->reason,
                ]);
				return redirect()->back()->with(['success' => "Points added successfully"]);
			}else{
				return redirect()->back()->with(['error' => "Something went wrong"]);
			}
		}
		if($request->type == "minus"){
			if($request->minus_point <= $request->total_points){
				$points = $request->total_points - $request->minus_point;
				PurchagePlan::where('id', $request->id)->update(['points'=>$points]);
				DB::table('points')->insert([
                    'user_id' => $request->user_id,
                    'subscription_plan_id' => $request->plan_id,
                    'points' => $request->minus_point,
                    'type' => $request->type,
                    'reason' => $request->reason,
                ]);
				return redirect()->back()->with(['success' => "Points detect successfully"]);
			}else{
				return redirect()->back()->with(['error' => "Something went wrong"]);
			}
		}
    }
}