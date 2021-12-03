<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplyTuitonPayment;

class ApplyTuitonPaymentController extends Controller
{
    public function ApplyForTuition()
    {
		$datas = ApplyTuitonPayment::with('UserStudent')->with('UserTutor')->where('status', '1')->get();
        return view('admin.apply-for-tuition.apply-for-tuition')->with(['datas' => $datas]);
    }
    public function ApplyForTuitionQuery()
    {
		$datas = ApplyTuitonPayment::with('UserStudent')->with('UserTutor')->where('status', '0')->get();
        return view('admin.apply-for-tuition.apply-for-tuition-query')->with(['datas' => $datas]);
    }
}
