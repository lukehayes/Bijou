<?php

return [
    'view'     =>  \DI\Create(Bijou\View::class),
    'request'  =>  \DI\Create(Bijou\Request::class),
    'session'  =>  \DI\Create(Bijou\Session::class),
    'str'      =>  \DI\Create(Bijou\Str::class),
    'database' =>  \DI\Create(Bijou\Database::class),
    'router'   =>  \DI\Create(Bijou\Router::class),
    'routeManager'   =>  \DI\Create(Bijou\RouteManager::class),
    'eventManager'   =>  \DI\Create(Bijou\Event\EventManager::class),
];
