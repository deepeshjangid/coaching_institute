<?php
namespace App\Helpers;
use Ixudra\Curl\Facades\Curl;
use Session;

class commonHelper{
	
    
	public static function sendMsg($mobile,$txtmsg){
		$txtmsg=rawurlencode($txtmsg); 
		
		$url="http://api.smsala.com/api/SendSMS?api_id=API689955247990&api_password=G1RCbCzeKy&sms_type=P&encoding=T&sender_id=FUDUIO&phonenumber=".$mobile."&textmessage=".$txtmsg;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_exec($ch);
		curl_close($ch);
	}

    public static function sendOtp($mobile){
        // $app = env('APP_ENV');
        // if($app == "local"){
            $otp = "1111";
        // }else{
        //     $otp = mt_rand(1000,9999);
		// 	$msg ="Dear Customer, Welcome to Tutor, your OTP is ".$otp." to login into our online portal. Thank you";
		// 	// $this->sendMsg($mobile,$msg);
        // }

        return $otp;
	}
}


?>