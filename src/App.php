<?php
namespace MVP;

use MVP\Request;
use MVP\Router;
use MVP\Session;
use MVP\View;

class App
{
    /**
     * @var MVP\Request instance */
    private $request = NULL;

    /**
     * @var MVP\Router instance */
    private $router = NULL;

    /**
     * @var MVP\View instance */
    private $view = NULL;

    /**
     * @var MVP\App instance 
     * @static */
    private static $instance = NULL;

    public function __construct()
    {
        $this->router = new Router; 
        $this->view = new View; 
    }

    /**
     * App factory creation function
     *
     * @return MVP\App
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

    public function getRouter() : Router
    {
        return $this->router;
    }
}
