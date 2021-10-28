<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Validator;
use Session;
use Hash;
use DB;

class StudentController extends Controller
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

                        if($request->hasFile('profile_image')) {
                            $image = $request->file('profile_image');
                            $image_update = "student_".rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
                            $destinationPath = public_path('/uploads/students');
                            $image->move($destinationPath, $image_update);
                        }else{
                            $student = Student::where('user_id', $id)->first();
                            $image_update = $student->profile_image;
                        }

                        User::where('id', $id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                        ]);
                        $student = Student::where('user_id', $id)->first();
                        if($student){
                            Student::where('user_id', $id)->update([
                                'subjects' => $request->subjects,
                                'city' => $request->city,
                                'gender'=> $request->gender,
                                'address'=> $request->address,
                                'institute_name'=> $request->institute_name,
                                'parents_name'=> $request->parents_name,
                                'profile_image'=> $image_update,
                            ]);
                        }else{
                            Student::insert([
                                'user_id' => $id,
                                'subjects' => $request->subjects,
                                'city' => $request->city,
                                'gender'=> $request->gender,
                                'address'=> $request->address,
                                'institute_name'=> $request->institute_name,
                                'parents_name'=> $request->parents_name,
                                'profile_image'=> $image_update,
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
        $user = User::where('id', $id)->where('status', '1')->where('delete_status', '1')->first();
        $student = Student::where('user_id', $id)->first();

        if($student && $user){
            $data = array_merge($user->toArray(), $student->toArray());
        }elseif(!$student && $user){
            $data = $user;
        }else{
            $data = array();
        }

        return view('student.student-profile')->with('data', $data);

    }
}
