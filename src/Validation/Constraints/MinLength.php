<?php

namespace Validation\Constraints;

class MinLength extends Constraint 
{
    protected $errorMessage = "Value is too short. Min length is %d";

    protected $defaultMinLength = 5;

    public function validate() 
    {
        return strlen($this->value) >= $this->getMinLength();
    }

    public function getErrorMessage()
    {
        return sprintf($this->errorMessage, $this->getMinLength());
    }

    protected function getMinLength()
    {
        return isset($this->config['min_length']) ? (int)$this->config['min_length'] : $this->defaultMinLength;
    }
}