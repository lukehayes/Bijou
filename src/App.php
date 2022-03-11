<?php
namespace Bijou;

use Bijou\Container;
use App\Controllers\HomeController;

class App
{
    public $container = NULL;
    public $eventManager = NULL;
    public $routeManager = NULL;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->eventManager = $this->container->getService('eventManager');
        $this->addRoutes();
        $this->eventManager->runEvent('init');
        $this->routeManager = $this->container->getService('routeManager');
        $this->routeManager->setContainer($this->container);
    }

    /**
     * Start the application.
     */
    public function run()
    {
        $this->eventManager->runEvent('run');
        $routeManager = $this->container->getService('routeManager');

        try
        {
            $routeManager->dispatch();
        }catch(\Exception $e)
        {
            echo $e->getMessage() . " On Line: " . $e->getLine() . " of file: " . $e->getFile();
        }
        $this->eventManager->runEvent('shutdown');
    }

    /**
     * Add all the routes available to the application from this method.
     */
    private function addRoutes()
    {
        // TODO Horrible solution but its a start.
        // Set the routes from a specific routes file.
        $routeManager = $this->container->getService('routeManager');
        $routeManager->setRoutesFromFile("routes.php");
    }
}
