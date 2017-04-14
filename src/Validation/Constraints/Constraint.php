<?php

namespace Validation\Constraints;

abstract class Constraint 
{
    protected $value;

    protected $errorMessage = 'Field is not valid';

    protected $config = [];

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    abstract public function validate();

    /**
     * Sets the value of errorMessage.
     *
     * @param mixed $errorMessage the error message
     *
     * @return self
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}