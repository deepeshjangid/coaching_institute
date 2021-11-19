<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Paytm;
use Session;
class PaytmController extends Controller
{
 
    public function pay(Request $request)
    {

        Paytm::insert([
            'user_id' => Session::get('user_id'),
            'subscription_plan_id' => $request->plan_id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'services' => $request->services,
            'amount' => $request->amount,
            'order_id' => $request->mobile.rand(1,1000),
        ]);
        return redirect(route('subscription.plan'))->with('success', "Plan successfully purchaged.");

        // $paytmuser = Paytm::create($userData);

        // $payment = PaytmWallet::with('receive');

        // $payment->prepare([
        //     'order' => $userData['order_id'], 
        //     'user' => $paytmuser->id,
        //     'name' => $userData['name'],
        //     'mobile' => $userData['mobile'],
        //     'services' => $userData['services'],
        //     'amount' => $userData['amount'],
        //     'callback_url' => route('status')
        // ]);
        // return $payment->receive();
    }
 
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
 
        $response = $transaction->response();
         
        $order_id = $transaction->getOrderId(); // return a order id
       
        $transaction->getTransactionId(); // return a transaction id
     
        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            Paytm::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('select.plan'))->with('message', "Your payment is successfull.");
 
        } else if ($transaction->isFailed()) {
            Paytm::where('order_id', $order_id)->update(['status' => 0, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('select.plan'))->with('message', "Your payment is failed.");
             
        } else if ($transaction->isOpen()) {
            Paytm::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('select.plan'))->with('message', "Your payment is processing.");
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
         
        // $transaction->getOrderId(); // Get order id
    }

}