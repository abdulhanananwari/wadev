<?php

namespace Solumax\PhpHelper\Helpers;

class QrCode {

    // This will generate a link that display the QR Code
    public static function link($string) {
        return action('\Solumax\PhpHelper\Http\Controllers\Api\QrCodeGenerator@png', $string);
    }

    public static function png($string) {

        include(__DIR__ . '/../Libraries/phpqrcode.php');
        return \QRcode::png($string);
    }

}
