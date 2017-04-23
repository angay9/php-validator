<?php

namespace Validation\Constraints;

class NotEmpty extends Constraint 
{
    protected $errorMessage = "Value can't be empty!";

    public function validate() 
    {
        return !empty($this->value);
    }
}