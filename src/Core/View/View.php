<?php

namespace PE\Component\ECommerce\Core\View;

class View
{
    /**
     * @var array
     */
    public $vars = [];

    /**
     * @var string
     */
    public $template;

    /**
     * @param array  $vars
     * @param string $template
     */
    public function __construct(array $vars = [], $template = null)
    {
        $this->vars     = $vars;
        $this->template = $template;
    }
}