<?php
namespace Bijou;

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
        $this->templatePath = dirname(__DIR__) ."/templates/";
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
     * Print a variable out inside a view file.
     *
     * @param mixed $value.
     *
     * @return void
     */
    public function print($value)
    {
        // Maybe implement this using __get style method so that
        // the API could be $this->value?.
        if( !empty($value) )
        {
            echo $value . "<br/>";
        }else
        {
            echo "Value Not Set " . __FUNCTION__;
        }
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
