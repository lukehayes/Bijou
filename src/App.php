<?php
namespace Bijou;

use Bijou\Container;

class App
{

    /**
     * @var Bijou\App instance 
     * @static */
    private static $instance = NULL;

    public function __construct()
    {
        //$this->container = new Container();
    }

    /**
     * App factory creation function
     *
     * @return Bijou\App
     */
    public static function create() : App
    {
        if(is_null(self::$instance))
        {
            return new App;
        }else
        {
            return self::$instance;
        }
    }

    public static function getInstance()
    {
        return self::$instance;
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
