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
}
