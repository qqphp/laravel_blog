<?php

namespace Ichynul\RowTable\Field;

use Encore\Admin\Form\Field;
use Encore\Admin\Form\Field\PlainInput;

class TextSmall extends Field
{
    use PlainInput;

    /**
     * Get placeholder.
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->label;
    }

     /**
     * Render this filed.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $this->initPlainInput();

        $this->setLabelClass(['hidden'])->attribute(['title' => $this->label()]);

        $this
            ->defaultAttribute('type', 'text')
            ->defaultAttribute('style', 'text-align:center;font-size:12px;')
            ->defaultAttribute('id', $this->id)
            ->defaultAttribute('name', $this->elementName ? : $this->formatName($this->column))
            ->defaultAttribute('value', old($this->column, $this->value()))
            ->defaultAttribute('class', 'form-control ' . $this->getElementClassString())
            ->defaultAttribute('placeholder', $this->getPlaceholder());

        $this->setWidth(12, 0);

        $this->addVariables([
            'prepend' => false,
            'append' => false,
        ]);

        return parent::render();
    }
}
