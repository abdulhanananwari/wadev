<?php

namespace Solumax\PhpHelper\Http\Controllers\Web;

use Solumax\PhpHelper\Http\Controllers\ApiBaseV1Controller as Controller;
use Illuminate\Http\Request;

class ApplicationManagementController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function update() {
        
        $outputs = [];
        $returnVal = '';
        
        exec('git pull origin master 2>&1', $outputs, $returnVal);
        exec('git submodule update 2>&1', $outputs, $returnVal);
        exec('gulp 2>&1', $outputs, $returnVal);
        
        return implode("<br>", $outputs) . "<br>Code: " . $returnVal;
    }

}
