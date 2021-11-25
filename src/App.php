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
        $router = $this->container->get('router');
        $view = $this->container->get('view');

        if(!$router->isRouteFound())
        {
            $router->get("/", function()
            {
                $this->container->get('view')->render('hello');
            });

            $router->get("/signup", function()
            {
                $this->container->get('view')->render('form');
            });

            $router->post("/form", function()
            {
                dump($this->container->get('request')->name);
                dump($this->container->get('request')->age);
            });

            return;

        } else
        {
            $view->renderPartial("error/404");
            return;
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
