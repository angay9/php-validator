<?php

namespace Events;

abstract class Listener 
{
    abstract public function handle($event = null);

    abstract function listensFor();
}