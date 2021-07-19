<?php
namespace MVP;

/**
 * Wrapper/abstraction class for a request.
 */
class Request
{
    public $path = NULL;

    public function __construct()
    {
        $this->path = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Is the current request GET or not?
     *
     * @return bool
     */
    public function isGet() : bool
    {
        return $this->method == "GET" ?? false;
    }

    /**
     * Is the current request POST or not?
     *
     * @return bool
     */
    public function isPost() : bool
    {
        return $this->method == "POST" ?? false;
    }
}


