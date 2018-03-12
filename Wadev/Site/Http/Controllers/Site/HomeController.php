<?php
namespace Wadev\Site\Http\Controllers\Site;


use Solumax\PhpHelper\Http\Controllers\ApiBaseV1Controller as Controller;


class HomeController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function getIndex(){
        return view('wadev.site::site.home.index');
    }
}

