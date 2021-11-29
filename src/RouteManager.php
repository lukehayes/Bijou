<?php
namespace Bijou;

/**
 * A single place to store all of the routes used in the application.
 */
class RouteManager
{
    private $routes = [];

    public function __construct()
    {
        $this->routes["/"] = [
            "route" => "/",
            "action" => function($container)
            {
                $container->get('view')->render('hello');
            }
        ];

        $this->routes["/signup"] = [
            "route" => "/signup",
            "action" => function($container)
            {
                $container->get('view')->render('form');
            }
        ];

        $this->routes["/form"] = [
            "route" => "/form",
            "action" => function($container)
            {
                dump($container->get('request')->name);
                dump($container->get('request')->age);
            }
        ];


    }

    public function getRoutes()
    {
        return $this->routes;
    }
}

