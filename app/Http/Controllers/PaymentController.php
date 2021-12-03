<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\PurchagePlan;
use App\Models\ApplyTuitonPayment;
  
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

    public function ApplyForTutionPayment(Request $request)
    {
        $input = $request->all();
  
        $api = new Api('rzp_test_el72DFtTI4GCy9', 'c1piho4tFbLaeI70XpGlLYOh');
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                ApplyTuitonPayment::insert([
                    'user_id' => Session::get('user_id'),
                    'parent_id' => $request->parent_id,
                    'amount' => $request->amount,
                    'order_id' => 'order_id_'.rand(1,1000000),
                    'transaction_id' => $input['razorpay_payment_id'],
                    'status' => '1',
                ]);
                return redirect()->back()->with('success', "Payment successful & congratulations on your purchase.");
  
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function ApplyForTutionQuery(Request $request, $id)
    {

        try {
            ApplyTuitonPayment::insert([
                'user_id' => Session::get('user_id'),
                'parent_id' => $id,
                'amount' => '0',
                'order_id' => '0',
                'transaction_id' => "0",
                'status' => '0',
            ]);
            return redirect()->back()->with('success', "Your query has been succefully submitted.");

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}