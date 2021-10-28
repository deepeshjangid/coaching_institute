<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\admin;
use App\Models\User;
use DB;
use Hash;
use Validator;
use Session;

class AdminController extends Controller
{
	public function login(Request $req)
    {
        $data= new User();
        $email = $req->post('email');
		$password = $req->post('password');
        if(isset($email)){
            $data = DB::select("select * from users where email='$email'");
            if($data){
                   $pass = user::where(['email'=>$email])->first();
                    if(Hash::check($password, $pass->password)){
                        $req->session()->put('admin_login',true);
                        $req->session()->put('admin_id',$pass->id);
                        $req->session()->put('admin_email',$pass->email);
                        return redirect('/admin/dashboard');
                    }else{
                        $req->session()->flash('error','Invalid Cridential Information');
                        return redirect()->back();  
                    }
            }else{
                $req->session()->flash('error','Invalid Cridential Information');
                return redirect()->back();  
            }
            
        }else{
            $req->session()->flash('error','Invalid your Cridntial Information');
            return redirect()->back();

        }
    }
   

    public function changepassword(Request $request){   

		if($request->ajax()){
			
			$rules=[
				'old_pass' => 'required',
				'password' => 'required|min:8',
				'confirm_password' => 'required|min:8|same:password',
			];
			
			$validator = Validator::make($request->all(), $rules);
 
			if ($validator->fails()) {
				$message = [];
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				} 
				
				return response(array("error"=>false,"message" => $message),403); 
						
			}else{
				$email =Session()->get('admin_email');
				$checkUser = User::where(['email'=>$email])->first();
				
				if(!Hash::check($request->old_pass, $checkUser->password)){
					
					return response(array('message'=>'Old password does not match. please try again.'),403);
					
				}else{
					
					User::where('email',$email)->update(['password'=>Hash::make($request->password)]);
					
					return response(array('message'=>'Password updated successfully.','reset'=>true),200);
				}

			}
		}

        return view('admin/change_password');
    } 

    public function logout(Request $req)
    {
		$req->session()->forget('admin_login');
		$req->session()->forget('admin_id');
		$req->session()->forget('admin_email'); 
		$req->session()->flash('success','Logout Successfully done');
		return redirect('/admin');
        
    }

    public function dashboard()
    {   
       $students = User::where('user_type','1')->where('delete_status','1')->get();
       $tutors = User::where('user_type','2')->where('delete_status','1')->get();
       $institutes = User::where('user_type','3')->where('delete_status','1')->get();
	   return view('admin.dashboard')->with(compact('students', 'tutors', 'institutes'));
    }
    
   
}
