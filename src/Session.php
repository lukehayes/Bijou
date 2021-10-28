<?php 
namespace Bijou;

/**
 * A wrapper class for the SESSION super global with some
 * helper methods built in.
 *
 * @author Me
 */
class Session
{
    /**
     * Calls PHP's session_start() function.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Get all of the variables currently stored inside $_SESSION.
     *
     * @return array
     */
    public function all() : array
    {
        return $_SESSION;
    }

    /**
     * Set a session variable in the $_SESSION array.
     *
     * @param string $index
     * @param string $value
     *
     * @return void
     */
    public function set(string $index, string $value) : void
    {
        $_SESSION[$index] = $value;
    }

    /**
     * Get a session variable from the $_SESSION array.
     *
     * @param string $index
     *
     * @return string | NULL
     */
    public function get(string $index) : string|NULL
    {
        return $_SESSION[$index] ?? NULL;
    }
        
    /**
     * Completely remove all defined session variables.
     *
     * @return void
     */
    public function destroy()
    {
        unset($_SESSION);
    }
}
