<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;
use App\Models\Student;
use DB;

class UserController extends Controller
{
	public function Users()
    {
		$datas = User::with('Category')->with('SubCategory')->with('Course')->whereIn('user_type', ['1','2','3'])->where('delete_status','1')->get();
        return view('admin.user.user')->with('datas',$datas);
    }

    public function Students()
    {
        $datas = DB::table('students')
                    ->join('users', 'students.user_id', '=', 'users.id')
                    ->select('users.*', 'students.*')
                    ->where('users.user_type', '1')
                    ->where('users.status', '1')
                    ->where('users.delete_status', '1')
                    ->get();
        return view('admin.user.student')->with('datas',$datas);
    }

    public function Tutors()
    {
		$datas = DB::table('tutors')
                    ->join('users', 'tutors.user_id', '=', 'users.id')
                    ->select('users.*', 'tutors.*')
                    ->where('users.user_type', '2')
                    ->where('users.status', '1')
                    ->where('users.delete_status', '1')
                    ->get();
        return view('admin.user.tutor')->with('datas',$datas);
    }

    public function Institutes()
    {
		$datas = DB::table('institutes')
                    ->join('users', 'institutes.user_id', '=', 'users.id')
                    ->select('users.*', 'institutes.*')
                    ->where('users.user_type', '3')
                    ->where('users.status', '1')
                    ->where('users.delete_status', '1')
                    ->get();
        return view('admin.user.institute')->with('datas',$datas);
    }

    public function Destroy(Request $request, $id)
    {
		$checkResult=User::find($id);
		
		if($checkResult){
			User::where('id', $id)->delete();
			$request->session()->flash('success','User deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->back();

    }
	public function ChangeStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }
	
	public function AdminVerify(Request $request)
    {
        $user = User::find($request->id);
        $user->admin_verify = $request->status;
        $user->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }

    public function StudentForms()
    {
		$datas = DB::table('student_forms')->where('delete_status','1')->orderBy('id', 'desc')->get();
        return view('admin.form.student')->with('datas',$datas);
    }

    public function TutorForms()
    {
		$datas = DB::table('tutor_forms')->where('delete_status','1')->orderBy('id', 'desc')->get();
        return view('admin.form.tutor')->with('datas',$datas);
    }

    public function InstituteForms()
    {
		$datas = DB::table('institute_forms')->where('delete_status','1')->orderBy('id', 'desc')->get();
        return view('admin.form.institute')->with('datas',$datas);
    }

}
