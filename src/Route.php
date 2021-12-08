<?php
namespace Bijou;

/**
 * class represents a single route in the application.
 */
class Route
{
    /**
     * @var string The route path.
     */
    private $path = NULL;

    /**
     * @var string The controller class to relate to the path.
     */
    private $controller = NULL;

    /**
     * @var string The action to relate to the path.
     */
    private $action = NULL;

    /**
     * @var string The METHOD to relate to the path.
     */
    private $method;

    public function __construct(string $path, $controller, $action, $method = "GET")
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
        $this->method = $method;
    }


    /**
     * Path getter.
     *
     * @return string The path.
     */
    public function getPath() : string
    {
        return $this->path;
    }

    /**
     * Action getter.
     *
     * @return string The path.
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Controller getter.
     *
     * @return string The path.
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * METHOD getter.
     *
     * @return string The method.
     */
    public function getMethod() : string
    {
        return $this->method;
    }

}

