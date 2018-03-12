<?php

namespace Solumax\PhpHelper\App\Mongo;

class SerialManager {

    protected $model;
    public $force = false;

    public function __construct($model) {
        $this->model = $model;
    }

    public function get() {

        $serial = (object) $this->model->getAttribute('serial');

        if (isset($serial->number)) {
            $serial->string = $this->model->incrementingSerial ? $serial->number : ($serial->tenant_id . '/' . $serial->year . '/' . $serial->month . '/' . $serial->number);
        }
        
        return $serial;
    }

    public function set() {
        return $this->assign();
    }

    public function assign() {

        if ($this->model->exists && !$this->force) {
            throw new Exception('Cannot generate serial because object has been saved previously');
        }

        $number = $this->getNewNumber();

        if ($this->model->incrementingSerial) {

            $this->model->serial = [
                'tenant_id' => \ParsedJwt::getByKey('selected_tenant_id'),
                'year' => $this->model->created_at ? $this->model->created_at->year :   \Carbon\Carbon::now()->year,
                'month' => $this->model->created_at ? $this->model->created_at->month :   \Carbon\Carbon::now()->month,
                'number' => $number
            ];
        } else {

            $this->model->serial = [
                'tenant_id' => \ParsedJwt::getByKey('selected_tenant_id'),
                'year' => \Carbon\Carbon::now()->year,
                'month' => \Carbon\Carbon::now()->month,
                'number' => $number
            ];
        }
    }

    public function getNewNumber() {

        $query = $this->model->newQuery();
        
        if ($this->model->incrementingSerial) {
           
            
            $last = $query
                        ->where('serial.year', $this->model->created_at ? $this->model->created_at->year :   \Carbon\Carbon::now()->year)
                        ->where('serial.month', $this->model->created_at ? $this->model->created_at->month : \Carbon\Carbon::now()->month)
                        ->orderBy('created_at', 'desc')->first();

        } else {
            $last = $query
                            ->where('serial.year', \Carbon\Carbon::now()->year)
                            ->where('serial.month', \Carbon\Carbon::now()->month)
                            ->orderBy('id', 'desc')->first();
        }

            
           return ($last && $last->getAttribute('serial')) ? ($last->getAttribute('serial.number') + 1) : 1;
        
        
        

    }

}
