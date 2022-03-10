<?php
namespace Bijou\Traits;

trait AppHelperTrait
{
    public function setContainer(object $cls)
    {
        $this->container = $cls;
    }
}

