<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\PurchagePlan;
  
class PaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function Payment(Request $request)
    {
        $input = $request->all();
  
        $api = new Api('rzp_test_el72DFtTI4GCy9', 'c1piho4tFbLaeI70XpGlLYOh');
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                PurchagePlan::insert([
                    'user_id' => Session::get('user_id'),
                    'subscription_plan_id' => $request->plan_id,
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'services' => $request->services,
                    'amount' => $request->amount,
                    'order_id' => 'order_id_'.rand(1,1000000),
                    'transaction_id' => $input['razorpay_payment_id'],
                    'status' => '1',
                ]);
                return redirect(route('subscription.plan'))->with('success', "Payment successful & congratulations on your purchase.");
  
            } catch (Exception $e) {
                return redirect(route('subscription.plan'))->with('error', $e->getMessage());
            }
        }
    }
}