<?php

namespace Solumax\PhpHelper\App\Traits;

trait UpdatedSave {
    
    public function save(array $options = array()) {
        
        if (is_array($this->doNotSave)) {
            
            $tempHolder = [];
            foreach ($this->doNotSave as $doNotSave) {
                
                if (isset($this->$doNotSave)) {
                
                    $tempHolder[$doNotSave] = $this->$doNotSave;
                    unset($this->$doNotSave);
                }
            }
        }
        
        parent::save($options);
        
        if (isset($tempHolder)) {
            
            foreach ($tempHolder as $key => $value) {
                $this->$key = $value;
            }
        }
    }
}
