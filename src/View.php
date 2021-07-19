<?php
namespace MVP;

/**
 * View is an abstract for a quick and dirty way of
 * loading templates inside the application.
 */
class View
{
    public $templatePath = NULL;

    /**
     * An array that holds all of the page data for a particular view */
    private $templateVars = [];

    public function __construct()
    {
        $this->templatePath = getcwd() ."/templates/";
    }

    /**
     * Render a template file.
     *
     * @param string $template.
     *
     * @return void.
     */
    public function render($template)
    {
        require_once $this->templatePath . $template . ".php";
    }

    /**
     * Set a variable so that it is available inside the view.
     *
     * @param string $name    The name of the data.
     * @param mixed  $value   The value of the data.
     *
     * @return void
     */
    public function set(string $name, $value) : void
    {
        $this->$name = $value;
    }

}
