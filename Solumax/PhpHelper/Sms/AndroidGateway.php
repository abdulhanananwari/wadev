<?php

namespace Solumax\PhpHelper\Sms;

class AndroidGateway {
    
    public static function send($to, $message, $androidIp = null, $password = null, $port = null) {
        
        
        if (is_null($androidIp)) {
            $androidIp = env('ANDROID_SMS_GATEWAY_IP');
        }
        
        if (is_null($password)) {
            $password = env('ANDROID_SMS_GATEWAY_PASSWORD');
        }
        
        if (is_null($port)) {
            $port = env('ANDROID_SMS_GATEWAY_PORT', '9090');
        }
        
        $client = new \GuzzleHttp\Client();
        
        $client->get('http://' . $androidIp . ':' . $port . '/sendsms', [
            'query' => [
                'phone' => $to,
                'text' => $message,
                'password' => $password,
            ]
        ]);
    }
}
