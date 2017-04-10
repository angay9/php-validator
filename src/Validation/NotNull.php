<?php

namespace Validation;

class NotNull extends Constraint 
{
    protected $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    // Template method
    public function validate() 
    {
        return !is_null($this->value);
    }

    public function getErrorMessage()
    {
        return "Value can't be null!";
    }
}