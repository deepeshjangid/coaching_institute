<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\Institue;
use App\Models\SubscriptionPlan;
use App\Helpers\commonHelper;
use Validator;
use Hash;
use DB;
use Session;

class HomeController extends Controller
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

    public function index()
    {
        $testimonials = Testimonial::where('status', '1')->where('delete_status', '1')->get();
        return view('index', compact('testimonials'));
    }

    public function Register(Request $request){ 

		if($request->ajax()){

			$rules=[
                'user_type' => 'required',
                'name' => 'required',
                'mobile' => 'required|max:10|unique:users,mobile',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
			];
			
			$validator = Validator::make($request->all(), $rules);

			$response = array("error" => true, "message" => "Something went wrong. Try again!"); 
			
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
                    
                    if((int) $request->mobile >0){
                        
                        $userResult=User::where('mobile', $request->mobile)->first();
                        
                        if($userResult){
                            return response(array("error" => false, "reset"=>false, "message" => "User already registered. Please login!"),200);
                        }else{
                            
                            User::insert([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'mobile'=>$request->mobile,
                                'password'=>Hash::make($request->password),
                                'user_type'=>$request->user_type,
                                'status'=> '1',
                                'delete_status'=> '1',
                                'admin_verify'=> '1',
                            ]);

                            return response()->json(['error' => false, 'registration' => true, 'message'=>'Registration successfully completed']);
                        }
                    }

                }catch (\Exception $e) {
					return response(array("error" => true, "message" => $e->getMessage()),403); 
				}
			}
			return response($response);
		}
    }

    public function Login(Request $request){ 

        if($request->ajax()){

			$rules=[
                'mobile' => 'required|max:10',
                'password' => 'required',
			];
			
			$validator = Validator::make($request->all(), $rules);

			$response = array("error" => true, "message" => "Something went wrong. try again!"); 
			
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
                    if((int) $request->mobile >0){

                        $user = User::where('mobile', $request->mobile)->first();
                        if($user){
                            if(Hash::check($request->password, $user->password)){
                                Session::put('user_login', true);
                                Session::put('user_id', $user->id);
                                Session::put('user_mobile', $user->mobile);
                                Session::put('user_type', $user->user_type);
                                return response()->json(['error' => false, 'login' => true, 'message'=>'Login successfully completed']);
                            }else{
                                return response()->json(['error' => true, 'message'=>'Incorrect Password']);
                            }
                            
                        }else{
                            return response()->json(['error' => true, 'message'=>'Mobile number not registered']);
                        }
                    }
                }catch (\Exception $e) {
                    return response(array("error" 
                        => true, "message" => $e->getMessage()),403); 
                }
            }
            return response($response);
        }
    }

    public function Logout(Request $request){
        if(Session::get('user_login')){
            $request->session()->forget('user_login');
            $request->session()->forget('user_id');
            $request->session()->forget('user_mobile');
            $request->session()->forget('user_type');
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success','Successfully log out');
        }else{
            return redirect('/')->with('success','Successfully log out');
        }
    }

    public function StudentForm(Request $request)
    {

        if($request->ajax()){

            $rules=[
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'subjects' => 'required',
                'city' => 'required',
                'pincode' => 'required',
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
                        DB::table('student_forms')->insert([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'subjects' => $request->subjects,
                            'city' => $request->city,
                            'pincode'=> $request->pincode,
                        ]);
                        
                        return response(array("error" => false, "reset"=>true, "message" => "Form successfully submitted."),200);
						
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
    }

    public function TutorForm(Request $request)
    {

        if($request->ajax()){

            $rules=[
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'subjects' => 'required',
                'city' => 'required',
                'pincode' => 'required',
                'highest_qualification' => 'required',
                'experience' => 'required',
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
                        DB::table('tutor_forms')->insert([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'subjects' => $request->subjects,
                            'city' => $request->city,
                            'pincode'=> $request->pincode,
                            'highest_qualification'=> $request->highest_qualification,
                            'experience'=> $request->experience,
                        ]);
                        
                        return response(array("error" => false, "reset"=>true, "message" => "Form successfully submitted."),200);
						
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
    }

    public function InstituteForm(Request $request)
    {

        if($request->ajax()){

            $rules=[
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'type' => 'required',
                'subjects' => 'required',
                'address' => 'required',
                'city' => 'required',
                'pincode' => 'required',
                'established_year' => 'required',
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
                        DB::table('institute_forms')->insert([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'type' => $request->type,
                            'subjects' => $request->subjects,
                            'address' => $request->address,
                            'city' => $request->city,
                            'pincode'=> $request->pincode,
                            'established_year'=> $request->established_year,
                        ]);
                        
                        return response(array("error" => false, "reset"=>true, "message" => "Form successfully submitted."),200);
						
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
    }

    public function SubscriptionPlan()
    {
        $students_plans = SubscriptionPlan::where('user_type', '1')->where('delete_status', '1')->get();
        $tutors_plans = SubscriptionPlan::where('user_type', '2')->where('delete_status', '1')->get();
        $institutes_plans = SubscriptionPlan::where('user_type', '3')->where('delete_status', '1')->get();
        return view('subscription-plan', compact('students_plans', 'tutors_plans', 'institutes_plans'));
    }

    public function PlanPurchage(Request $request)
    {
        $plan_id = $request->id;
        $plan = SubscriptionPlan::where('id', $plan_id)->first();
        $price = $request->price;

        return view('plan-purchage', compact('plan', 'plan_id', 'price'));
    }

}
