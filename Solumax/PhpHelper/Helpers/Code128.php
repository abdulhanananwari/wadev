<?php

namespace Solumax\PhpHelper\Helpers;

class Code128 {

    // This will generate a link that display the Barcode
    public static function link($string) {
        return action('\Solumax\PhpHelper\Http\Controllers\Api\BarcodeGenerator@png', $string);
    }

    public static function png($string, $size = 50) {

        include(__DIR__ . '/../Libraries/barcode.php');
        return barcode(null, $string, $size);
    }

}
