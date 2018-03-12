<?php

namespace Solumax\PhpHelper\App;

use Jenssegers\Mongodb\Eloquent\Model;
use Solumax\PhpHelper\App\Traits\ParseField;
use Solumax\PhpHelper\App\Traits\UpdatedSave;
use Solumax\PhpHelper\App\Traits\Mongo\Assigner;

class BaseModelMongo extends Model {

    use ParseField,
        UpdatedSave,
        Assigner;

    protected $connection = 'mongodb';

    public function saveId() {

        $this->id = $this->_id;
        $this->save();
    }

}
