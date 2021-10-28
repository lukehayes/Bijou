<?php
namespace Bijou;

use Bijou\Request;
use Bijou\Router;
use Bijou\Session;
use Bijou\View;

class App
{
    /**
     * @var Bijou\Request instance */
    private $request = NULL;

    /**
     * @var Bijou\Router instance */
    private $router = NULL;

    /**
     * @var Bijou\View instance */
    private $view = NULL;

    /**
     * @var Bijou\App instance 
     * @static */
    private static $instance = NULL;

    public function __construct()
    {
        $this->router = new Router; 
        $this->request = new Request; 
        $this->view = new View; 
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

    public function getRouter() : Router
    {
        return $this->router;
    }
}
