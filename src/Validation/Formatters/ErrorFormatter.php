<?php

namespace Validation\Formatters;

// Strategy
abstract class ErrorFormatter 
{
    abstract public function format(array $errors);
}