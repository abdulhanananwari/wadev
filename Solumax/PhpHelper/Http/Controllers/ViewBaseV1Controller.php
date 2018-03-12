<?php

namespace Solumax\PhpHelper\Http\Controllers;

use Illuminate\Routing\Controller;

class ViewBaseV1Controller extends Controller {
    
    public function __construct() {
        
    }
    
    public function formatErrors($errors) {
        
        $viewData = [
            'errors' => $errors
        ];
        
        return view('solumax.phpHelper::viewController.formatErrors')
            ->with('viewData', $viewData);
    }
}
