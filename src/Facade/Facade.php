<?php
namespace Bijou\Facade;

/**
 * Base class all Facades should use.
 */
class Facade
{
    public static function __callStatic($name, $args = null)
    {
        $cls = new (static::class::getFacadeAccessor());
        return $cls->$name($args);
    }

    public static function getFacadeAccessor() : string
    {
        // Override
    }
}
