<?php
namespace Bijou\Event;

class EventManager
{
    private $events = [];

    public function __construct()
    {
        $this->events['init'] = [];
        $this->events['run'] = [];
        $this->events['shutdown'] = [];
    }

    /**
     * Add new event to the Event Manager.
     *
     * @param string $eventName        The name of the event
     * @param Callable $eventObject    The object to be ran.
     *
     * @return void
     */
    public function addEvent(string $eventName, Callable $eventObject)
    {
        $this->events[$eventName][] = $eventObject;
    }

    /**
     * Run all of the events in the Event Manager.
     */
    public function runEvents()
    {
        foreach($this->events as $eventName)
        {
            foreach($eventName as $event)
            {
                $event();
            }
        }
    }

    /**
     * Run all the events from a specific type.
     *
     * @param string $event    The name of the event to run.
     */
    public function runEvent(string $event)
    {
        if(array_key_exists($event, $this->events))
        {
            foreach($this->events[$event] as $e)
            {
                $e();
            }
        }
    }
}

