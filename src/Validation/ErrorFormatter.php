<?php

namespace Validation;

// Strategy
abstract class ErrorFormatter 
{
    abstract public function format(array $errors);
}