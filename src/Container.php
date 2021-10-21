<?php
namespace MVP;

use DI\ContainerBuilder;

/**
 * Wrapper class for PHP-DI
 */
class Container
{
    private $builder = NULL;

    public function __construct()
    {
        $this->builder = new ContainerBuilder();
    }

    public function getContainer()
    {
        return $this->builder->build();
    }
}

