<?php

namespace Validation\Formatters;

class JsonFormatter extends ErrorFormatter 
{
    public function format(array $errors) 
    {
        return json_encode($errors);
    }
}