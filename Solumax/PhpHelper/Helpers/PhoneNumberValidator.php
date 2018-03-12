<?php

namespace Solumax\PhpHelper\Helpers;

class PhoneNumberValidator {
    
    public static function validate($phoneNumber, $minLength = null, $callingCode = null) {
        
        if (!preg_match('/^\+?\d+$/', $phoneNumber)) {
            return false;
        }
        
        if (!is_null($minLength) && strlen($phoneNumber) < $minLength) {
            return false;
        }
        
        if (!is_null($callingCode) && substr($phoneNumber, 0, strlen($callingCode)) != $callingCode) {
            return false;
        }
        
        return true;
    }
}
