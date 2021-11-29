<?php
namespace Bijou;

use DI\ContainerBuilder;

/**
 * Wrapper class for PHP-DI
 */
class Container
{
    private $builder = NULL;

    public function __construct()
    {
        $this->initContainer();
    }

    /**
     * Setup the PHP-DI container and add all of the class definitions.
     *
     * @return void
     */
    public function initContainer()
    {
        $this->builder = new ContainerBuilder();

        $this->builder->addDefinitions([
            'view'     =>  \DI\Create(View::class),
            'request'  =>  \DI\Create(Request::class),
            'session'  =>  \DI\Create(Session::class),
            'str'      =>  \DI\Create(Str::class),
            'database' =>  \DI\Create(Database::class),
            'router'   =>  \DI\Create(Router::class),
            'routeManager'   =>  \DI\Create(RouteManager::class),
        ]);
    }

    /**
     * PHP-DI Contianer getter.
     *
     * @return Container
     */
    public function getContainer()
    {
        return $this->builder->build();
    }
}

