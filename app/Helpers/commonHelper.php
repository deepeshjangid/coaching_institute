<?php
namespace App\Helpers;
use Ixudra\Curl\Facades\Curl;
use Session;

class commonHelper{
	
    
	public static function sendMsg($mobile,$txtmsg){

		$api_key = '561AB2EDFBFE88';
		$contacts = $mobile;
		$from = 'OTPSRV';
		$template_id = '1207161520890934567';
		$sms_text = rawurlencode($txtmsg).'.';
		$template_id = '1207161520890934567';
		
		//Submit to server
		
		$url="http://kutility.org/app/smsapi/index.php?key=561AB2EDFBFE88&campaign=12692&routeid=7&type=text&contacts=".$contacts."&senderid=OTPSRV&msg=".$sms_text."&template_id=1207161520890934567";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_exec($ch);
		curl_close($ch);

	}

    public static function sendOtp($mobile){
        $app = env('APP_ENV');
        if($app == "local"){
            $otp = "1111";
        }else{
            $otp = mt_rand(1000,9999);
			$msg ="Welcome to tutor, your OTP is ".$otp." please dont share your OTP to anyone";
			\App\Helpers\commonHelper::sendMsg($mobile,$msg);
        }

        return $otp;
	}
}


?>