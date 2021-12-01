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

        $this->builder->addDefinitions(getcwd() . "/../src/DIConfig.php");
    }

    /**
     * Disable all of PHPDI settings to create a basic container.
     *
     * @return void
     */
    public function disableDIConfig()
    {
        $this->builder->useAutowiring(false);
        $this->builder->useAnnotations(false);
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

