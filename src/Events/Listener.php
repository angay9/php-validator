<?php

namespace Events;

abstract class Listener 
{
    abstract public function handle($data = null);

    abstract function listensFor();
}