<?php

namespace Solumax\PhpHelper\App\Traits\Mongo;

trait Assigner {

    public function assignId($field = null) {

        if (!is_null($field)) {
            $this->setAttribute($field, new \MongoDB\BSON\ObjectId());
        }

        return new \MongoDB\BSON\ObjectId();
    }

    public function assignTimestamp($field = null) {

        if (!is_null($field)) {
            $this->setAttribute($field, \Carbon\Carbon::now());
        }

        return \Carbon\Carbon::now();
    }

    public function assignEntityData($field = null) {

        $data = [
            'name' => \ParsedJwt::getByKey('name'),
            'user_id' => \ParsedJwt::getByKey('sub'),
            'timestamp' => \Carbon\Carbon::now()->timestamp,
        ];

        if (!is_null($field)) {
            $this->setAttribute($field, $data);
        }

        return $data;
    }

}
