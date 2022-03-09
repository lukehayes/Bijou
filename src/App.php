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
        $view = $this->container->getService('view');
        $routeManager = $this->container->getService('routeManager');

        // TODO Abstract routes out completely.
        $routeManager->addRoute(new Route("/", HomeController::class, "index"));

        $routes = $routeManager->getRoutes();

        $c = 0;
        while(!$router->routeFound)
        {
            if ($c > 3) {
                $router->routeFound = true;
            }

            if ( $route = ($routeManager->getRoute($request->path))) 
            {
                $controller = new ($route->getController());
                $action = $route->getAction();
                $controller->$action();

                $router->routeManager = true;
                break;
            } else
            {
                $view->renderPartial("error/404");
            }

            $c++;
        }

        $this->eventManager->runEvent('shutdown');
    }

    /**
     * Add all the routes available to the application from this method.
     */
    private function addRoutes()
    {
        // TODO Horrible solution but its a start.
        $routeManager = $this->container->getService('routeManager');
        $routeManager->addRoute(new Route("/", HomeController::class, "index"));
    }
}
