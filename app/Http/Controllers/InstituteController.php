<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\User;
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

                        User::where('id', $id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                        ]);
                        $institute = Institute::where('user_id', $id)->first();
                        if($institute){
                            Institute::where('user_id', $id)->update([
                                'subjects' => $request->subjects,
                                'type'=> $request->type,
                                'established_year'=> $request->established_year,
                                'city' => $request->city,
                                'pincode' => $request->pincode,
                                'address'=> $request->address,
                            ]);
                        }else{
                            Institute::insert([
                                'user_id' => $id,
                                'subjects' => $request->subjects,
                                'type'=> $request->type,
                                'established_year'=> $request->established_year,
                                'city' => $request->city,
                                'pincode' => $request->pincode,
                                'address'=> $request->address,
                            ]);
                        }
                        return response(array("error" => false, "reset"=>false,"message" => "Profile updated successfully."),200);
						
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
        return view('institute.institute-profile')->with('data', $data);

    }
}
