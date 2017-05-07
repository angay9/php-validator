<?php

namespace Events;

class EventDispatcher implements EventDispatcherInterface
{
    protected $listeners = [];

    /**
     * Attach a listener
     *
     * @param Listener $listener
     * @return void
     */
    public function attach(Listener $listener)
    {
        $key = $this->getListenerKey($listener);

        if (!isset($this->listeners[$key])) 
        {
            $this->listeners[] = $listener;
        }
    }

    /**
     * Detach a given listener
     *
     * @param Listener $listener
     * @return void
     */
    public function detach(Listener $listener)
    {
        $key = $this->getListenerKey($listener);

        if (isset($this->listeners[$key])) 
        {
            unset($this->listeners[$key]);
        }
    }

    /**
     * Notify listeners  subscribed to event
     *
     * @param string $event
     * @param array $data
     * @return void
     */
    public function notify($event, array $data = [])
    {
        // var_dump($event, $this->listeners);
        foreach ($this->listeners as $listener) 
        {
            if ($listener->listensFor() === $event) 
            {
                $listener->handle($data);
            }
        }
    }

    /**
     * Get listener key
     *
     * @param Listener $listener
     * @return void
     */
    protected function getListenerKey($listener)
    {
        return spl_object_hash($listener);
    }
}