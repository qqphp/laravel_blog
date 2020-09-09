<?php

namespace Ichynul\Configx\Field;

use Encore\Admin\Form\Field;

class Outer extends Field
{
    /**
     * Create a new Outer instance.
     *
     * @param mixed $text
     * @param array $arguments
     */
    public function __construct($html, $arguments = [])
    {
        $this->html = $html;
    }

    public function render()
    {
        return $this->html;
    }
}
