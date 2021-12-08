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
                $container->getService('view')->render('hello');
            }
        ];

        $this->routes["/signup"] = [
            "route" => "/signup",
            "action" => function($container)
            {
                $container->getService('view')->render('form');
            }
        ];

        $this->routes["/form"] = [
            "route" => "/form",
            "action" => function($container)
            {
                dump($container->getContainer()->get('request')->name);
                dump($container->getContainer()->get('request')->age);
            }
        ];
    }

    
    /**
     * Add a new route to the available application routes
     *
     * @param string $path      The new route path.
     * @param string $callback  The callback to run.
     * @param string $method    The method type GET, POST etc.
     *
     * @return void
     */
    public function addRoute($path, $callback, $method = "GET")
    {
        $this->routes[$path] = [
            "route" => $path,
            "action" => $callback
        ];
    }

    /**
     * Get all of the routes available to the application.
     *
     * @return array
     */
    public function getRoutes() : array
    {
        return $this->routes;
    }
}

