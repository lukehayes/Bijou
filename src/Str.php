<?php
namespace MVP;

/**
 * Helper methods for working with strings.
 */
class Str
{
    /**
     * Split a string by a specific character.
     *
     * @param string $char.
     *
     * @param string $str.
     *
     * @retrun array
     */
    static public function splitByChar($char, $str)
    {
        return preg_split("/$char/", $str);
    }


    /**
     * Convert an array to a string
     *
     * @param array $arr.
     *
     * return string.
     */
    static public function arrayToString($arr)
    {
        return implode($arr);
    }
}
