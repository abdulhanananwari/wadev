<?php

namespace Solumax\PhpHelper\App;

class JsonModel {

    public function __construct($json) {
        $array = json_decode($json, true);

        foreach ((array) $array as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __get($name) {
        if (isset($this->$name)) {
            return $this->$name;
        };

        return null;
    }

}
