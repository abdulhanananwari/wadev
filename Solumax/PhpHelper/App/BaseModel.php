<?php

namespace Solumax\PhpHelper\App;

use Illuminate\Database\Eloquent\Model;

use Solumax\PhpHelper\App\Traits\ParseField;
use Solumax\PhpHelper\App\Traits\UpdatedSave;

class BaseModel extends Model {
    
    use ParseField, UpdatedSave;
}
