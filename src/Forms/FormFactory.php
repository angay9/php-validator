<?php

namespace Forms;

use Events\EventDispatcher;
use Validation\Validator;

class FormFactory 
{
    public static function make($formClass)
    {
        return new $formClass(
            new Validator,
            new EventDispatcher
        );
    }
}