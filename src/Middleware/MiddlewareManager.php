<?php
namespace Bijou\Middleware;

use Bijou\Middleware\MiddlewareHandler;

/**
 * Stores a list of all middlewares and has the ability to run all of them.
 */
class MiddlewareManager
{
    private $middlewares = [];

    public function __construct() {}

    /**
     * Add a new middleware to the list.
     *
     * @param MiddlewareHandler $middleware
     *
     * @return void
     */
    public function addMiddleware(MiddlewareHandler $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * Run each middleware in the list.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->middlewares as $middleware) 
        {
            $middleware->handle();
        }
    }



}

