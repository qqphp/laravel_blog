<?php

namespace Ichynul\RowTable;

use Encore\Admin\Widgets\Table;

class FromTable extends Table
{
    /**
     * @var boolean
     */
    protected $useDiv = false;

    /**
     * @var boolean
     */
    protected $headers_th = false;

    /**
     * Set table headers.
     *
     * @param array $headers
     *
     * @return $this
     */
    public function useDiv($div = true)
    {
        $this->useDiv = $div == true;

        return $this;
    }

    /**
     * Set table whether th headers.
     *
     * @param boolean $th
     *
     * @return $this
     */
    public function headersTh($th = true)
    {
        $this->headers_th = $th == true;

        return $this;
    }

    /**
     * whether using div
     *
     * @return bollean
     */
    public function usingDiv()
    {
        return $this->useDiv;
    }

    /**
     * whether using div
     *
     * @return bollean
     */
    public function usingHeadsTh()
    {
        return $this->heads_th;
    }

    public function render()
    {
        if ($this->usingDiv()) {

            $this->view = 'row-table::display.div';

        } else {

            $this->view = 'row-table::display.table';
        }

        $vars = [
            'headers' => $this->headers,
            'rows' => $this->rows,
            'style' => $this->style,
            'attributes' => $this->formatAttributes(),
            'headers_th' => $this->headers_th
        ];

        return view($this->view, $vars)->render();
    }
}