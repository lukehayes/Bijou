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
    private $viewData = [];

    public function __construct()
    {
        $this->templatePath = getcwd() ."/templates/";
    }

    /**
     * Render a specific template file without header and footer partials.
     *
     * @param string $template.
     *
     * @param array $templateVars. An array of variables to me made available
     *                             inside the view template.
     *
     * @return void.
     */
    public function renderPartial($template, $templateVars = [])
    {
        extract($templateVars);
        require_once $this->templatePath . $template . ".php";
    }

    /**
     * Render a template file with default header and footer partials included.
     *
     * @param string $template.
     *
     * @param array $templateVars. An array of variables to me made available
     *                             inside the view template.
     *
     * @return void.
     */
    public function render($template, $templateVars = [])
    {
        extract($templateVars);
        $this->renderPartial("partials/header");
        require_once $this->templatePath . $template . ".php";
        $this->renderPartial("partials/footer");
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
