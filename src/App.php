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

        $c = 0;
        while(!$router->routeFound)
        {
            if ($c > 3) {
                $router->routeFound = true;
            }

            if (array_key_exists($request->path, $routeManager->getRoutes())) 
            {
                $action = $routeManager->getRoutes()[$request->path];
                $action["action"]($this->container);
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
