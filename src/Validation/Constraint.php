<?php

namespace Validation;

abstract class Constraint 
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

    // Template methods
    abstract public function validate();
    abstract public function getErrorMessage();
}