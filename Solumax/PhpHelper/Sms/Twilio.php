<?php

namespace Solumax\PhpHelper\Sms;

class Twilio {
    
    public static function send($to, $message, $accountSid = null, $authToken = null, $phoneNumber = null) {
        
        return \Solumax\PhpHelper\Twilio\Sms::send($to, $message, $accountSid, $authToken, $phoneNumber);
    }
}
