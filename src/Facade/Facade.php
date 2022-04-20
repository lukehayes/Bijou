<?php
namespace Bijou\Facade;

/**
 * Base class all Facades should use.
 */
class Facade
{
    public static function __callStatic($name, $args = null)
    {
        $facadeCls = new (static::class);
        $cls = new ($facadeCls::getFacadeAccessor());
        return $cls->$name($args);
    }

    public static function getFacadeAccessor() : string
    {
        // Override
    }
}
