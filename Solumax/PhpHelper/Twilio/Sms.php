<?php

namespace Solumax\PhpHelper\Twilio;

class Sms {
    
    public static function send($to, $message, $accountSid = null, $authToken = null, $phoneNumber = null) {
        
        if (is_null($accountSid)) {
            $accountSid = env('TWILIO_ACCOUNT_SID');
        }
        
        if (is_null($authToken)) {
            $authToken = env('TWILIO_AUTH_TOKEN');
        }
        
        if (is_null($phoneNumber)) {
            $phoneNumber = env('TWILIO_PHONE_NUMBER');
        }
        
        $client = new \GuzzleHttp\Client();
        $client->post('https://api.twilio.com/2010-04-01/Accounts/' . $accountSid . '/Messages.json', [
            'auth' => [ $accountSid , $authToken ],
            'form_params' => [
                'To' => $to,
                'From' => $phoneNumber,
                'Body' => $message
            ]
        ]);
    }
}
