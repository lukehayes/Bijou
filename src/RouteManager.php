<?php
namespace Bijou;

use Bijou\Route;

/**
 * A single place to store all of the routes used in the application.
 */
class RouteManager
{
    private $routes = [];

    public function __construct()
    {
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
    public function addRoute(Route $route)
    {
        $this->routes[$route->getPath()] = [
            "route" => $route->getPath(),
            "action" => $route->getAction()
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

