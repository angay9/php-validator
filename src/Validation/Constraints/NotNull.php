<?php

namespace Validation\Constraints;

class NotNull extends Constraint 
{
    protected $errorMessage = "Value can't be null!";

    public function validate() 
    {
        return !is_null($this->value);
    }
}