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
        $router = $this->container->getContainer()->get('router');
        $request = $this->container->getContainer()->get('request');
        $view = $this->container->getContainer()->get('view');
        $routeManager = $this->container->getContainer()->get('routeManager');

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

    /**------------------------------------------------------------------------------
     * Magic Methods
     ------------------------------------------------------------------------------*/

    public function __get($name) 
    {
        // Call to the the PHPDI container specifically.
        if($name == "container")
        {
            $container = new Container();
            return $container->getContainer();
        }
    }
}
