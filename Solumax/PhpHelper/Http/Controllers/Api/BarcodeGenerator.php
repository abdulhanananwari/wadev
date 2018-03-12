<?php

namespace Solumax\PhpHelper\Http\Controllers\Api;

use Solumax\PhpHelper\Http\Controllers\ApiBaseV1Controller as Controller;
use Illuminate\Http\Request;

class BarcodeGenerator extends Controller {

    public function png($string, Request $request) {
        
        switch ($request->get('type')) {
            case 'barcode':
                return \Solumax\PhpHelper\Helpers\Code128::png($string);
            case 'qrcode':
                return \Solumax\PhpHelper\Helpers\QrCode::png($string);
            default:
                return \Solumax\PhpHelper\Helpers\Code128::png($string);
        }
    }

}
