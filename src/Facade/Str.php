<?php
namespace Bijou\Facade;

use Bijou\Facade\Facade;

class Str extends Facade
{
    public static function getFacadeAccessor() : string
    {
        return 'Bijou\Str';
    }
}
