<?php

namespace Solumax\PhpHelper\App\AngularManagement;

class AngularManagementApp {

    public function version() {
        return $this;
    }

    public function reset() {

        $timestamp = \Carbon\Carbon::now()->timestamp;
        \Storage::disk('local')->put('phpHelper/angularManagement/timestampVersion', $timestamp);
    }

    public function retrieve() {

        return \Cache::remember('version', 5, function() {
            
            if (\Storage::disk('local')->has('phpHelper/angularManagement/timestampVersion')) {
                return \Storage::disk('local')->get('phpHelper/angularManagement/timestampVersion');
            }
            return null;
        });
    }

}
