<?php

namespace Solumax\PhpHelper\Http\Controllers\Api;

use Solumax\PhpHelper\Http\Controllers\ApiBaseV1Controller as Controller;
use Illuminate\Http\Request;

class AngularManagementController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->angularManagementApp = new \Solumax\PhpHelper\App\AngularManagement\AngularManagementApp();
    }

    public function reset() {
        
        $this->angularManagementApp->version()->reset();
    }

    public function retrieve() {
        return $this->angularManagementApp->version()->retrieve();
    }
}
