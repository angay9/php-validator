<?php

namespace Validation\Constraints;

class MaxFileSize extends Constraint 
{
    protected $errorMessage = "File size is too big. Max size is %d bytes";

    protected $defaultMaxSize = 2048000; // 2mb

    public function validate() 
    {
        return $this->getMaxSize() >= $this->value['size'];
    }

    public function getErrorMessage()
    {
        return sprintf($this->errorMessage, $this->getMaxSize());
    }

    protected function getMaxSize()
    {
        return isset($this->config['max_size']) ? (int)$this->config['max_size'] : $this->defaultMaxSize;
    }
}