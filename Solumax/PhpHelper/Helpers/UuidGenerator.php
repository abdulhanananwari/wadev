<?php

namespace Solumax\PhpHelper\Helpers;

class UuidGenerator {
    
    public static function generate($length = null) {

    	$string = md5(sha1(time() + rand()));

    	if ($length) {
    		$string = substr($string, 0, $length);
    	}
        
        return $string;
    }
}
