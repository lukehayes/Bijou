<?php
namespace Bijou;

use Bijou\Container;

class App
{

    public $container = NULL;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Start the application.
     */
    public function run()
    {
        $router = $this->container->getService('router');
        $request = $this->container->getService('request');
        $view = $this->container->getService('view');
        $routeManager = $this->container->getService('routeManager');

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

    }
}
