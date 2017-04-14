<?php

namespace Validation\Constraints;

class Email extends Constraint 
{
    protected $errorMessage = "Value is not a valid email";

    public function validate() 
    {
        return filter_var($this->value, FILTER_VALIDATE_EMAIL);
    }
}