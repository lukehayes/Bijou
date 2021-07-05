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

    public function __construct()
    {
        $this->router = new Router; 
        $this->view = new View; 
    }
}
