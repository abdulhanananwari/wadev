<?php

namespace Solumax\PhpHelper\App\Mongo;

use MongoDB\BSON\UTCDateTime;
use Solumax\PhpHelper\App\Mongo\DotAccess;

class SubDocument {

    public function __construct($subdocument = null) {

        if (!is_null($subdocument)) {
            foreach ((array) $subdocument as $key => $value) {
                $this->$key = $value;
            }
        }

        return $this;
    }

    public function toCarbon($name, $toDateTimeString = false) {

        if ($this->get($name) instanceof UTCDateTime) {
            $carbon = \Carbon\Carbon::instance($this->get($name)->toDateTime())->tz(config('app.timezone'));
        } else if (is_string($this->get($name))) {
            $carbon = \Carbon\Carbon::parse($this->get($name))->tz(config('app.timezone'));
        }

        if (isset($carbon)) {
         
            if ($toDateTimeString == true) {
                return $carbon->toDateTimeString();
            }
            
            return $carbon;
        }

        return null;
    }

    public function __get($name) {

        if (isset($this->$name)) {
            return $this->$name;
        } else {
            return null;
        };
    }

    public function __set($name, $value) {

        $this->$name = $value;

        if (substr($name, -3) == '_at') {
            $this->setDate($name, $value);
        };
    }

    public function setDate($key, $value) {

        if (is_numeric($value)) {
            $this->$key = new UTCDateTime($value * 1000);
        } else if ($value instanceof \Carbon\Carbon) {
            $this->$key = new UTCDateTime($value->timestamp * 1000);
        }
    }

    public function fill(Array $data) {

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function get($path) {
        $data = new DotAccess((array) $this);
        return $data->get($path);
    }

    public function getAttribute($path) {
        return $this->get($path);
    }

    public function set($path, $value) {

        $data = new DotAccess((array) $this);
        $data->set($path, $value);

        $this->fill($data->all());
    }

}
