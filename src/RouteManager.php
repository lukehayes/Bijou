<?php
namespace Bijou;

use Bijou\Route;

/**
 * A single place to store all of the routes used in the application.
 */
class RouteManager
{
    use Traits\AppHelperTrait;

    private $routes = [];

    /**
     * Load pre-defined routes from a file in the public/ directory.
     *
     * @return void
     */
    public function setRoutesFromFile($routesFile)
    {
        $this->routes = include getcwd() . "/" . $routesFile;
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
     * Get the total number of routes available.
     *
     * @return int
     */
    public function getRouteCount() : int
    {
        return count($this->routes);
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

    /**
     * Load the correct path/action etc
     */
    public function dispatch()
    {
        $router = $this->container->getService('router');
        $routeManager = $this->container->getService('routeManager');
        $request = $this->container->getService('request');

        $counter = 0;
        while(!$router->isRouteFound())
        {
            foreach($routeManager->getRoutes() as $route)
            {
                if($request->path == $route->getPath()) {
                    $controller = $route->getController();
                    $action = $route->getAction();
                    $controller->$action();
                    $router->routeFound = true;

                    break;
                }else if( $counter == count($routeManager->getRoutes()))
                {
                    throw new \Exception("Route dispatch failed for {$request->path}. Route could not be found");
                }
                // TODO Need to check case where route isn't defined!

            }
            $counter++;
        }
    }
}

