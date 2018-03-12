<?php

namespace Solumax\PhpHelper\App\Mongo;

use Solumax\PhpHelper\App\BaseModelMongo;

class EmbedModel extends BaseModelMongo {
    
    public function getParent() {
        return $this->getParentRelation()->getParent();
    }
}
