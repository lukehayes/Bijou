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

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $name;
    }

    /**
     * Split a string by a specific character.
     *
     * @param string $char.
     *
     * @param string $str.
     *
     * @retrun array
     */
    private function splitBy($char, $str)
    {
        return preg_split("/$char/", $str);
    }
}


