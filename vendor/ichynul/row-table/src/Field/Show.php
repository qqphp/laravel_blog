<?php

namespace Ichynul\RowTable\Field;

use Encore\Admin\Form\Field;

class Show extends Field
{
    /**
     * @var string
     */
    protected $html = '';

    /**
     * @var string
     */
    protected $view = 'row-table::field.show';

    /**
     * styles
     *
     * @var array
     */
    protected $styles = [];

    /**
     * set text-align
     *
     * @param [strign] $align
     * @return $this
     */
    public function Textalign($align)
    {
        $this->addStyle('text-align', $align);

        return $this;
    }

    /**
     * set text-align
     *
     * @param [strign] $align
     * @return $this
     */
    public function textWidth($width)
    {
        $this->addStyle('width', $width);

        return $this;
    }

    /**
     * set text-align
     *
     * @param [strign] $align
     * @return $this
     */
    public function addStyle($key, $val)
    {
        $this->styles[$key] =   $val;

        return $this;
    }

    /**
     * Create a new Show instance.
     *
     * @param mixed $text
     * @param array $arguments
     */
    public function __construct($html, $arguments = [])
    {
        $this->html = $html;

        $this->width['field']  = array_get($arguments, 0, 12);

        $this->addStyle('width', 'auto');

        $this->addStyle('text-align', 'center');

        $this->addStyle('min-width', '70px');
    }

    public function variables()
    {
        return array_merge($this->variables, [
            'help'        => $this->help,
            'class'       => $this->getElementClassString(),
            'value'       => $this->html,
            'viewClass'   => $this->getViewElementClasses(),
            'attributes'  => $this->formatAttributes(),
            'divsSyles' => $this->formatStyles(),
        ]);
    }

    /**
     * Format the field attributes.
     *
     * @return string
     */
    protected function formatStyles()
    {
        $html = [];

        foreach ($this->styles as $name => $value) {
            $html[] = $name . ': ' . $value;
        }

        return implode(' ;', $html);
    }
}
