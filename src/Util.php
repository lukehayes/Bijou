<?php

/**
 * Simple dump and die function.
 */
function dnd(...$args)
{
    foreach ($args as $a) 
    {
        dump($a);
    }

    die("Died on file __FILE__ on line __LINE__");
}
