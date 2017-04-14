<?php

namespace Events;

class EventDispatcher implements EventDispatcherInterface
{
    protected $listeners = [];

    public function attach(Listener $listener)
    {
        $key = $this->getListenerKey();

        if (!isset($this->listeners[$key])) 
        {
            $this->listeners[] = $listener;
        }
    }

    public function detach(Listener $listener)
    {
        $key = $this->getListenerKey();

        if (isset($this->listeners[$key])) 
        {
            unset($this->listeners[$key]);
        }
    }

    public function notify($event, array $data = [])
    {
        foreach ($this->listeners as $listener) 
        {
            if ($listener->listensFor() === $event) 
            {
                $listener->handle($data);
            }
        }
    }

    protected function getListenerKey($listener)
    {
        return spl_object_hash($listener);
    }
}