<?php
namespace Bijou\Helpers;

/**
 * Scrub and clean input data passed in through forms etc.
 */
class Sanitizer
{
    public function __construct()
    {
    }

    /**
     * Simply a wrapper function for htmlentities.
     *
     * @param string $str
     *
     * @return string
     */
    static public function removeMarkupChars($str) : string
    {
        return htmlentities(
               trim($str),
               ENT_QUOTES | ENT_HTML5
        );
    }
}

