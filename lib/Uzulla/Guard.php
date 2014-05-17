<?php
namespace Uzulla;

class Guard {
    public $destruct;
    public function __construct($callable){
        $this->destruct = $callable;
    }
    public function __destruct(){
        call_user_func($this->destruct);
    }
}
