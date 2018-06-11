<?php

namespace Classes\Utils;

class Sms{

    const API_LOGIN = "192311668";
    const API_PASSWORD = "6NNR2wGu";
	
	/**
	 *  @author Denis Latushkin
	 *  @param \string phone Phone number to send an sms
	 *  @param \string message Text to be sent via sms, max=69 symbols
	 */
	public static function send(string $phone,string $message) {
		$curl = curl_init(); 
	
		curl_setopt($curl, CURLOPT_URL, 'http://api.rocketsms.by/json/send');	
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 
            "username=".self::API_LOGIN."&password=".self::API_PASSWORD."&phone=" . $phone . "&text=" . $message);
		
		$result = @json_decode(curl_exec($curl), true);
		
		if ($result && isset($result['id'])) {
			return  $result['id'];
		} elseif ($result && isset($result['error'])) {
            #print_r($result);
			return false;
		} else {
			return false;
		}
	}

	const LOGIN_CODE = 1;
	public static function getMessage($type, $data){
		switch($type){
			case self::LOGIN_CODE:
				return self::getLoginCodeMessage($data);
		}
	}

	private static function getLoginCodeMessage($data){
		return "Код для доступа на Desktop.rent: $data";
	}
}