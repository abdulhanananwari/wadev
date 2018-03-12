<?php

namespace Solumax\PhpHelper\Http\Controllers\Api;

use Solumax\PhpHelper\Http\Controllers\ApiBaseV1Controller as Controller;

class QrCodeGenerator extends Controller {

    public function png($string) {

        return \Solumax\PhpHelper\Helpers\QrCode::png($string);
    }

}
