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

    /**
     * Add a new route to the application.
     *
     * @param string $path     The path to the resource.
     * @param string $callback The callback action to run.
     * @param string $method   The method this route is for - GET or POST
     *
     * @return void
     *
     */
    public function addRoute($path,$callback, $method = "GET")
    {
        $this->routes[$path] = [
            "route" => $path,
            "action" => $callback
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}

