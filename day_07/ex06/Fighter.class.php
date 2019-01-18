<?php

class Fighter {
    private $name;
    
    public function __construct($input)
    {
        $this->name = $input;
    }
        
    public function getName()
    {
        return $this->name;
    }
}