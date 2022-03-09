<?php
namespace Bijou;

use Bijou\Container;
use App\Controllers\HomeController;

class App
{
    public $container = NULL;
    public $eventManager = NULL;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->eventManager = $this->container->getService('eventManager');
        $this->addRoutes();
        $this->eventManager->runEvent('init');
    }

    /**
     * Start the application.
     */
    public function run()
    {
        $this->eventManager->runEvent('run');
        $router = $this->container->getService('router');
        $request = $this->container->getService('request');
        $routeManager = $this->container->getService('routeManager');

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
                }

                // TODO Need to check case where route isn't defined!
            }
        }

        $this->eventManager->runEvent('shutdown');
    }

    /**
     * Add all the routes available to the application from this method.
     */
    private function addRoutes()
    {
        // TODO Horrible solution but its a start.
        
        // Set the routes from a specific routes file.
        $routeManager = $this->container->getService('routeManager');
        $routeManager->setRoutesFromFile("routes.php");
    }
}
