<?php
namespace Bijou;

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

        if(array_key_exists("QUERY_STRING", $_SERVER))
        {
            $this->queryString = $_SERVER["QUERY_STRING"];
        }
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

    /**
     * Get a value from the POST array if defined.
     *
     * @param string $name
     *
     * @return $name if exists, false otherwise.
     */
    public function get($name)
    {
        if($this->isPost()) 
        { 
            if(array_key_exists($name, $_POST))
            {
                return htmlentities(trim($_POST[$name]));
            }else
            {
                return false;
            }
        }

    }

    public function __get($name)
    {
        if($this->isPost())
        {
            // After check for POST, set the $name variable to a property
            // on the Request class as if it was already defined on it.
            $this->name = htmlentities(trim($_POST[$name]));
            return $this->name;
        }
    }
}


