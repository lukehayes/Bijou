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
        $this->routes[$route->getPath()] = $route;
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

    /**
     * Get a specific Route object if its available
     *
     * @param string $path    The path that applies to a specific route.
     *
     * @throws Exception.
     *
     * @return Route.
     */
    public function getRoute(string $path) : mixed
    {
        if(array_key_exists($path, $this->routes))
        {
            return $this->routes[$path];
        }else
        {
            throw new \Exception("Route for {$path} could not be found");
        }
    }
}

