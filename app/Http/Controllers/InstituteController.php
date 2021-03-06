<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\User;
use App\Models\PurchagePlan;
use App\Models\Course;
use Validator;
use Session;
use Hash;
use DB;

class InstituteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function Profile(Request $request)
    {

        if($request->ajax()){

            if($request->email !== null){
                $rules=[
                    'mobile' => ['required',Rule::unique('users')->where(function($query) {
                        $query->where('id', '!=', Session::get('user_id'));
                        })
                    ],
                    'email' => [Rule::unique('users')->where(function($query) {
                        $query->where('id', '!=', Session::get('user_id'));
                        })
                    ],
                ];
            }else{
                $rules=[
                    'mobile' => ['required',Rule::unique('users')->where(function($query) {
                        $query->where('id', '!=', Session::get('user_id'));
                        })
                    ],
                ];
            }
			
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
                        $id = Session::get('user_id');

                        $subjects_array = array();
						if($request->subjects) {
							foreach($request->subjects as $sub){
								$subjects_array[] = $sub;
							}
						}

                        User::where('id', $id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                        ]);

                        $user = User::where('id', $id)->first();

                        $institute = Institute::where('user_id', $id)->first();
                        if($institute){
                            Institute::where('user_id', $id)->update([
                                'subjects' => implode(",",$subjects_array), 
                                'type'=> $request->type,
                                'established_year'=> $request->established_year,
                                'city' => $request->city,
                                'pincode' => $request->pincode,
                                'address'=> $request->address,
                                'category_id'=> $user->category_id,
                                'sub_category_id'=> $user->sub_category_id,
                                'course_id'=> $user->course_id,
                                'remark'=> $request->remark,
                            ]);
                        }else{
                            Institute::insert([
                                'user_id' => $id,
                                'subjects' => implode(",",$subjects_array), 
                                'type'=> $request->type,
                                'established_year'=> $request->established_year,
                                'city' => $request->city,
                                'pincode' => $request->pincode,
                                'address'=> $request->address,
                                'category_id'=> $user->category_id,
                                'sub_category_id'=> $user->sub_category_id,
                                'course_id'=> $user->course_id,
                                'remark'=> $request->remark,
                            ]);

                            $institute = Institute::where('user_id', $id)->first();

                            User::where('id', $id)->update(['profile_url' => 'user-profile/institute/'.$institute->id]);
                        }
                        return response(array("error" => false, "reset"=>false,"message" => "Your profile has been updated."),200);
						
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}

        $id = Session::get('user_id');
        $user = User::where('id', $id)->where('delete_status', '1')->first();
        $institute = Institute::where('user_id', $id)->first();

        if($institute && $user){
            $data = array_merge($user->toArray(), $institute->toArray());
        }elseif(!$institute && $user){
            $data = $user;
        }else{
            $data = array();
        }

        $plans = PurchagePlan::with('SubscriptionPlan')->where('user_id', $id)->get();

        $courses = Course::where('status','1')->where('delete_status','1')->GroupBy('name')->get();

        return view('institute.institute-profile', compact('data', 'plans', 'courses'));

    }
}
