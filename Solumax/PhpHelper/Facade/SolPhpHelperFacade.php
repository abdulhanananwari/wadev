<?php

namespace Solumax\PhpHelper\Facade;

use Illuminate\Support\Facades\Facade;

class SolPhpHelperFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'SolPhpHelper';
    }

}
