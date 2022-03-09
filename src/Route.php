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

    /**
     * @var string The METHOD to relate to the path.
     */
    private $request;

    public function __construct(string $path, $controller, $action, $method = "GET")
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
        $this->method = $method;

        $this->request = new Request();
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
     * @return object An instance of the controller class.
     */
    public function getController() : object
    {
        return new $this->controller;
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

    /**
     * Get the request for the current route.
     *
     * @param Request $request.
     *
     * @return The request for the current route.
     */
    public function getRequest() : Request
    {
        // Todo Really horrible - will abstract this later.
        //
        return $this->request;
    }

}

