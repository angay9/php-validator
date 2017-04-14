<?php

namespace Events;

interface EventDispatcherInterface 
{
    public function attach(Listener $listener);

    public function detach(Listener $listener);
    
    public function notify($event, array $data = []);
}