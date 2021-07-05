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


        if(!$this->routeFound)
        {
            if($request->path == $path)
            {
                $fn($request);
                $this->routeFound = true;
                return;
            }
        }

        

        //if($request->path == $path && ! $this->routeFound)
        //{
            //$fn($request);
            //$this->routeFound = true;
            //return;
        //} else
        //{
            //if($request->path != $path && ! $this->routeFound)
            //{
                //throw new \Exception("An error occurred.");
                //$this->routeFound = true;
            //}
        //}
    }
}
