<?php
namespace Bijou\Middleware;

use Bijou\Middleware\MiddlewareHandler;
use Bijou\Request;

class TestMiddleware implements MiddlewareHandler
{
    /**
     * Return the next middleware in the chain.
     *
     * @param MiddlewareHandler $handler
     *
     * @return Middleware
     */
    public function next(MiddlewareHandler $handler) : MiddlewareHandler
    {
    }

    /**
     * Run the current middleware.
     *
     * @param Middleware $middleware
     *
     * @return Middleware
     */
    public function handle(Request $request = NULL)
    {
    }
}
