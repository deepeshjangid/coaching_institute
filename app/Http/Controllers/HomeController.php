<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\Institute;
use App\Models\SubscriptionPlan;
use App\Models\Course;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ApplyTuitonPayment;
use App\Models\Otp;
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
        $categories = Category::with('SubCategory')->where('status', '1')->where('delete_status', '1')->get();
        return view('index', compact('testimonials','categories'));
    }

    public function Register()
    {
        $categories = Category::where('status', '1')->where('delete_status', '1')->get();
        return view('register', compact('categories'));
    }
    public function GetSubCategory(Request $request)
    {
		$subcategories = SubCategory::where('category_id', $request->id)->where('status','1')->where('delete_status','1')->get();
		
		$output='';
		$output.='<option value="">Select Sub Category</option>';
		
		foreach($subcategories as $subcategory){
			$output.= '<option '; if($request->id==$subcategory->id){ $output.='selected'; } $output.=' value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
		}

		return Response($output);
    }
    public function GetCourse(Request $request)
    {
        echo $request->cat_id;
        echo $request->sub_id;
		$subcategories = Course::where('category_id', $request->cat_id)->where('sub_category_id', $request->sub_id)->where('status','1')->where('delete_status','1')->get();
		
		$output='';
		$output.='<option value="">Select Course</option>';
		
		foreach($subcategories as $subcategory){
			$output.= '<option '; $output.=' value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
		}

		return Response($output);
    }

    public function RegisterSubmit(Request $request){ 

		if($request->ajax()){

			$rules=[
                'user_type' => 'required',
                'category' => 'required',
                'sub_category' => 'required',
                'course' => 'required',
                'name' => 'required',
                'mobile' => 'required|max:10|unique:users,mobile',
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
                            return response(array("error" => false, "reset"=>false, "message" => "This mobile number is already exists. Try another mobile number."),200);
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
                                'category_id'=>$request->category,
                                'sub_category_id'=>$request->sub_category,
                                'course_id'=>$request->course,
                            ]);

                            $user = User::where('email', $request->email)->where('mobile', $request->mobile)->first();

                            Session::put('user_login', true);
                            Session::put('user_id', $user->id);
                            Session::put('user_name', $user->name);
                            Session::put('user_mobile', $user->mobile);
                            Session::put('user_type', $user->user_type);

                            return response()->json(['error' => false, 'login' => true, 'user_type' => $user->user_type, 'message'=>'Your registration has been successfully completed.']);
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

			$response = array("error" => true, "message" => "Something went wrong. try again."); 
			
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
                                Session::put('user_name', $user->name);
                                Session::put('user_mobile', $user->mobile);
                                Session::put('user_type', $user->user_type);
                                return response()->json(['error' => false, 'login' => true, 'user_type' => $user->user_type, 'message'=>'You are successfully logged in.']);
                            }else{
                                return response()->json(['error' => true, 'message'=>'That password’s not right. Try again.']);
                            }
                            
                        }else{
                            return response()->json(['error' => true, 'message'=> 'This mobile number is not register.']);
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
            $request->session()->forget('user_name');
            $request->session()->forget('user_mobile');
            $request->session()->forget('user_type');
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success','You have been successfully logged out.');
        }else{
            return redirect('/')->with('success','You have been successfully logged out.');
        }
    }

    public function OtpSubmit(Request $request){

        if($request->ajax()){

            $rules=[
                'mobile' => 'required',
                'otp1' => 'required',
                'otp2' => 'required',
                'otp3' => 'required',
                'otp4' => 'required',
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
                        $data = Otp::where('mobile', $request->mobile)->first();

                        if($data){

                            $otp = $request->otp1.$request->otp2.$request->otp3.$request->otp4;
                            if($data->otp == $otp){

                                Otp::where('mobile', $request->mobile)->update([
                                    'status'=> '1',
                                ]);
                                return response(array("error" => false, "otpvarified"=>true));
                            }else{
                                return response(array("error" => true, "message" => "Invalid OTP"));
                            }

                        }else{
                            
                            return response(array("error" => true, "message" => "Something went wrong."));
                        
                        }
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
    }

    public function StudentForm(Request $request){

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
                        
                    $data = Otp::where('mobile', $request->mobile)->first();

                    if($data && $data->status == '1'){

                        DB::table('student_forms')->insert([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'subjects' => $request->subjects,
                            'city' => $request->city,
                            'pincode'=> $request->pincode,
                        ]);

                        Otp::where('mobile', $request->mobile)->update([
                            'status'=> '0',
                        ]);

                        return response(array("error" => false, "reset"=>true, "formsubmit"=>true, "message" => "Form successfully submitted."),200);

                    }else{

                        $otp = commonHelper::sendOtp($request->mobile);

                        $row = Otp::where('mobile', $request->mobile)->first();

                        if($row){
                            Otp::where('mobile', $request->mobile)->update([
                                'otp'=>$otp,
                                'status'=> '0',
                            ]);
                        }else{
                            Otp::insert([
                                'mobile'=>$request->mobile,
                                'otp'=>$otp,
                            ]);
                        }
                        
                        return response(array("error" => false, "reset"=>false, "otp"=>true, "mobile" => $request->mobile, "message" => "OTP sent on your mobile number."),200);
                    
                    }
				
                }catch (\Exception $e) {
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
                    $data = Otp::where('mobile', $request->mobile)->first();

                    if($data && $data->status == '1'){

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
                        
                        Otp::where('mobile', $request->mobile)->update([
                            'status'=> '0',
                        ]);

                        return response(array("error" => false, "reset"=>true, "formsubmit"=>true, "message" => "Form successfully submitted."),200);

                    }else{

                        $otp = commonHelper::sendOtp($request->mobile);

                        $row = Otp::where('mobile', $request->mobile)->first();

                        if($row){
                            Otp::where('mobile', $request->mobile)->update([
                                'otp'=>$otp,
                                'status'=> '0',
                            ]);
                        }else{
                            Otp::insert([
                                'mobile'=>$request->mobile,
                                'otp'=>$otp,
                            ]);
                        }
                        
                        return response(array("error" => false, "reset"=>false, "otp"=>true, "message" => "OTP sent on your mobile number."),200);
                    
                    }
				}catch (\Exception $e) {
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

                    $data = Otp::where('mobile', $request->mobile)->first();

                    if($data && $data->status == '1'){

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

                        Otp::where('mobile', $request->mobile)->update([
                            'status'=> '0',
                        ]);

                        return response(array("error" => false, "reset"=>true, "formsubmit"=>true, "message" => "Form successfully submitted."),200);

                    }else{

                        $otp = commonHelper::sendOtp($request->mobile);

                        $row = Otp::where('mobile', $request->mobile)->first();

                        if($row){
                            Otp::where('mobile', $request->mobile)->update([
                                'otp'=>$otp,
                                'status'=> '0',
                            ]);
                        }else{
                            Otp::insert([
                                'mobile'=>$request->mobile,
                                'otp'=>$otp,
                            ]);
                        }
                        
                        return response(array("error" => false, "reset"=>false, "otp"=>true, "message" => "OTP sent on your mobile number."),200);
                    
                    }
				}catch (\Exception $e) {
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

    public function ContactUs()
    {
        $row = DB::table('contact_us_information')->first();
        return view('contact', compact('row'));
    }

    public function ContactUsSubmit(Request $request)
    {

        if($request->ajax()){

            $rules=[
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'subject' => 'required',
                'message' => 'required',
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
                        DB::table('contact_us')->insert([
                            'name' => $request->name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'subject' => $request->subject,
                            'message' => $request->message,
                        ]);
                        
                        return response(array("error" => false, "reset"=>true, "message" => "Thank you for getting in touch."),200);
						
					}
				catch (\Exception $e) {
					return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
				}
			}
			
			return response($response);

		}
    }

    public function AreaSearch(Request $request){
        $students=Student::where('city', 'LIKE', $request->search. '%')->groupBy('city')->get();
        $tutors=Tutor::where('city', 'LIKE', $request->search. '%')->groupBy('city')->get();
        $institutes=Institute::where('city', 'LIKE', $request->search. '%')->groupBy('city')->get();
        $results = []; 
        if(count($students) != '0'){
            foreach($students as $data){
                $results[] = ['value' => $data->city, 'label'=>$data->city];
            }
        }
        if(count($tutors) != '0'){
            foreach($tutors as $data){
                $results[] = ['value' => $data->city, 'label'=>$data->city];
            }
        }
        if(count($institutes) != '0'){
            foreach($institutes as $data){
                $results[] = ['value' => $data->city, 'label'=>$data->city];
            }
        }
        if(count($students) == '0' && count($tutors) == '0' && count($institutes) == '0'){
            $results[] = ['value' => 'no', 'label' =>'Area Not Found'];
        }
        return response()->json($results);
    }

    public function CourseSearch(Request $request){
        $course=Course::where('name', 'LIKE', '%' .$request->search. '%')->groupBy('name')->get();
        $category=Category::where('name', 'LIKE', '%' .$request->search. '%')->groupBy('name')->get();
        $sub_category=SubCategory::where('name', 'LIKE', '%' .$request->search. '%')->groupBy('name')->get();
        if(count($course) != '0'){
            foreach($course as $data){
                $results[] = ['value' => $data->name, 'label'=>$data->name];
            }
        }
        if(count($category) != '0'){
            foreach($category as $data){
                $results[] = ['value' => $data->name, 'label'=>$data->name];
            }
        }
        if(count($sub_category) != '0'){
            foreach($sub_category as $data){
                $results[] = ['value' => $data->name, 'label'=>$data->name];
            }
        }
        if(count($course) != '0' && count($category) != '0' && count($sub_category) != '0'){
            $results[] = ['value' => 'no', 'label' =>'Course Not Found'];
        }
        return response()->json($results);
    }

    public function Search(Request $request){

        if($request->type == 'student'){
            $type = $request->type;
            $rows=Student::select("*")->with('User')->whereRaw('FIND_IN_SET(?,subjects)', [$request->course])->where('city', $request->area)->get();
            return view('students-tutors-institutes', compact('rows','type'));
        }
        if($request->type == 'tutor'){
            $type = $request->type;
            $rows=Tutor::select("*")->with('User')->whereRaw('FIND_IN_SET(?,subjects)', [$request->course])->where('city', $request->area)->get();
            return view('students-tutors-institutes', compact('rows','type'));
        }      
        if($request->type == 'institute'){
            $type = $request->type;
            $rows=Institute::select("*")->with('User')->whereRaw('FIND_IN_SET(?,subjects)', [$request->course])->where('city', $request->area)->get();
            return view('students-tutors-institutes', compact('rows','type'));
        }
		
    }

    public function UserProfile(Request $request, $type, $id){
        $applied = '0';
        if($type == 'student'){
            $row=Student::with('User')->with('Category')->with('SubCategory')->with('Course')->where('id', $id)->first();
            return view('user-profile', compact('row','type'));
        }
        if($type == 'tutor'){
            $row=Tutor::with('User')->with('Category')->with('SubCategory')->with('Course')->where('id', $id)->first();

            $applied=ApplyTuitonPayment::where('user_id', Session::get('user_id'))->where('parent_id', $row['User']['id'])->first();
            if($applied){
                $applied = '1';
                return view('user-profile', compact('row','type', 'applied'));
            }else{
                $applied = '0';
                return view('user-profile', compact('row','type', 'applied'));
            }
        }      
        if($type == 'institute'){
            $row=Institute::with('User')->with('Category')->with('SubCategory')->with('Course')->where('id', $id)->first();
            return view('user-profile', compact('row','type'));
        }
		
    }

}
