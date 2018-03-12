<?php

namespace Solumax\PhpHelper\App\Traits;

trait ParseField {
    
    public function parseFieldToArray($fieldName, $asArray = true) {
        return $this->parseField($fieldName, $asArray);
    }
    
    public function parseField($fieldName, $asArray = true) {

        if (empty($this->$fieldName) || is_null($this->$fieldName) || $this->$fieldName == '') {
            return [];
        }

        if ($asArray) {
        
            return (array) json_decode($this->$fieldName, true);
        
        } else {
         
            return (object) json_decode($this->$fieldName);
        }        
    }
}
