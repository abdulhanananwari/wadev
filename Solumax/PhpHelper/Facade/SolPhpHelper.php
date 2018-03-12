<?php

namespace Solumax\PhpHelper\Facade;

class SolPhpHelper {

    public function angularManagement() {
        return new \Solumax\PhpHelper\App\AngularManagement\AngularManagementApp();
    }

}
