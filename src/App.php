<?php
namespace MVP;

use MVP\Request;
use MVP\Router;
use MVP\Session;
use MVP\View;

class App
{
    private $request = NULL;

    private $router = NULL;

    private $view = NULL;

    private static $instance = NULL;

    public function __construct()
    {
        $this->router = new Router; 
        $this->view = new View; 
    }

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
}
