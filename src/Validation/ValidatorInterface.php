<?php

namespace Validation;

interface ValidatorInterface 
{
    public function validate(array $data, array $constraints);
}