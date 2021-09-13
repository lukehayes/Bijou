<?php
namespace MVP;

use MVP\Request;

class Router
{
    
    private $routeFound = false;

    /**
     * Define a GET route.
     *
     * @param string $path
     * @param callable $fn
     *
     * @return void
     */
    public function get(string $path, callable $fn)
    {
        $request = new Request();

        if(!$this->routeFound && $request->isGet())
        {
            if($request->path == $path)
            {
                $fn($request);
                $this->routeFound = true;
                return;
            }
        }
    }

    /**
     * Define a POST route.
     *
     * @param string $path
     * @param callable $fn
     *
     * @return void
     */
    public function post(string $path, callable $fn)
    {
        $request = new Request();

        if(!$this->routeFound && $request->isPost())
        {
            if($request->path == $path)
            {
                $fn($request);
                $this->routeFound = true;
                return;
            }
        }
    }

    /**
     * Redirect the user to a different page.
     *
     * @param string $url
     * @param callable $permenant
     *
     * @return void
     */
    public function redirect($url, $permanent = false)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }

}
