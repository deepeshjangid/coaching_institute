<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\Institue;
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
            return redirect()->back()->with('success','Successfully log out');
        }else{
            return redirect()->back()->with('success','Successfully log out');
        }
    }

}
