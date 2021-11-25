<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\User;
use Validator;
use Session;
use Hash;
use DB;

class TutorController extends Controller
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
                            $image_update = "tutor_".rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
                            $destinationPath = public_path('/uploads/tutors/profile-images');
                            $image->move($destinationPath, $image_update);
                        }else{
                            $tutor = Tutor::where('user_id', $id)->first();
                            if($tutor){
                                $image_update = $tutor->profile_image;
                            }else{
                                $image_update = null;
                            }
                        }
                        if($request->hasFile('highest_qualification_doc')) {
                            $doc = $request->file('highest_qualification_doc');
                            $highest_qualification_doc = "doc_".rand(11111111, 99999999).'.'.$doc->getClientOriginalExtension();
                            $destinationPath = public_path('/uploads/tutors/docs');
                            $doc->move($destinationPath, $highest_qualification_doc);
                        }else{
                            $tutor = Tutor::where('user_id', $id)->first();
                            if($tutor){
                                $highest_qualification_doc = $tutor->highest_qualification_doc;
                            }else{
                                $highest_qualification_doc = null;
                            }
                        }
                        if($request->hasFile('id_proof')) {
                            $idproof = $request->file('id_proof');
                            $id_proof = "id_".rand(11111111, 99999999).'.'.$idproof->getClientOriginalExtension();
                            $destinationPath = public_path('/uploads/tutors/id-proofs');
                            $idproof->move($destinationPath, $id_proof);
                        }else{
                            $tutor = Tutor::where('user_id', $id)->first();
                            if($tutor){
                                $id_proof = $tutor->id_proof;
                            }else{
                                $id_proof = null;
                            }
                        }

                        User::where('id', $id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                        ]);
                        $tutor = Tutor::where('user_id', $id)->first();
                        if($tutor){
                            Tutor::where('user_id', $id)->update([
                                'subjects' => $request->subjects,
                                'fee'=> $request->fee,
                                'gender'=> $request->gender,
                                'city' => $request->city,
                                'pincode' => $request->pincode,
                                'address'=> $request->address,
                                'highest_qualification'=> $request->highest_qualification,
                                'highest_qualification_doc'=> $highest_qualification_doc,
                                'id_proof'=> $id_proof,
                                'profile_image'=> $image_update,
                                'occupation'=> $request->occupation,
                            ]);
                        }else{
                            Tutor::insert([
                                'user_id' => $id,
                                'subjects' => $request->subjects,
                                'fee'=> $request->fee,
                                'gender'=> $request->gender,
                                'city' => $request->city,
                                'pincode' => $request->pincode,
                                'address'=> $request->address,
                                'highest_qualification'=> $request->highest_qualification,
                                'highest_qualification_doc'=> $highest_qualification_doc,
                                'id_proof'=> $id_proof,
                                'profile_image'=> $image_update,
                                'occupation'=> $request->occupation,
                            ]);
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
        $tutor = Tutor::where('user_id', $id)->first();

        if($tutor && $user){
            $data = array_merge($user->toArray(), $tutor->toArray());
        }elseif(!$tutor && $user){
            $data = $user;
        }else{
            $data = array();
        }
        return view('tutor.tutor-profile')->with('data', $data);

    }
}
