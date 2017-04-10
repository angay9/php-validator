<?php

namespace Validation;

class Validator 
{
    protected $formatter;

    protected $errors = [];

    public function validate(array $data, array $constraints)
    {
        $this->errors = [];

        foreach ($data as $key => $value) 
        {
            $validators = !empty($constraints[$key]) ? $constraints[$key] : [];

            foreach ($validators as $constraint) 
            {
                $constraint->setValue($data[$key]);

                if (!$constraint->validate()) 
                {
                    $this->addError($key, $constraint->getErrorMessage());
                }
            } 
        }

        return count($this->errors) > 0;
    }

    protected function addError($key, $message)
    {
        if (!isset($this->errors[$key])) 
        {
            $this->errors[$key] = [];
        }

        $this->errors[$key][] = $message;
    }

    public function setErrorFormatter(ErrorFormatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function getErrors()
    {
        if (!$this->formatter) {
            throw new \LogicException("You need to set formatter before calling get errors");
        }

        return $this->formatter->format($this->errors);
    }
}