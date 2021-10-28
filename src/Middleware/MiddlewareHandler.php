<?php
namespace MVP\Middleware;

use MVP\Middleware\Middleware;
use MVP\Request;

interface MiddlewareHandler
{
    /**
     * Return the next middleware in the chain.
     *
     * @param MiddlewareHandler $handler
     *
     * @return Middleware
     */
    public function next(MiddlewareHandler $handler) : MiddlewareHandler;

    /**
     * Run the current middleware.
     *
     * @param Middleware $middleware
     *
     * @return Middleware
     */
    public function handle(Request $request = NULL);
}
