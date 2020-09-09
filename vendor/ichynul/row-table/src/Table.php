<?php

namespace Ichynul\RowTable;

use Closure;
use Encore\Admin\Form;
use Encore\Admin\Form\Field;
use Ichynul\RowTable\Field\Collect;
use Ichynul\RowTable\Field\CollectValidator;
use Ichynul\RowTable\Field\Show;

class Table extends Field implements Collect
{
    /**
     * @var array
     */
    protected static $css = [
        'vendor/laravel-admin-ext/row-table/table.css',
    ];

    /**
     * @var FromTable
     */
    protected $fromTable = null;

    /**
     * @var string
     */
    protected $view = 'row-table::table';

    /**
     * @var Form
     */
    protected $form = null;

    /**
     * class attr
     *
     * @var string
     */
    protected $defaultClass = 'table table-fields ';

    /**
     * @var array
     */
    protected $rows = [];

    public function __construct($label, $arguments = [])
    {
        $this->label = $label;

        $this->column = '__tabel__';

        $this->fromTable = new FromTable([], []);

        $this->fromTable->class($this->defaultClass);

        $func = array_get($arguments, 0, null);

        if ($func && $func instanceof Closure) {

            call_user_func($func, $this);
        }
    }

    public function isCollect()
    {
        return true;
    }

    /**
     * Call submitted callback.
     *
     * @return mixed
     */
    protected function bindSubmitted()
    {
        $this->form->submitted(function (Form $form) {

            $this->form->ignore($this->column);

            foreach ($this->rows as $row) {

                foreach ($row->geFields() as $field) {

                    $this->form->builder()->fields()->push($field);
                }
            }
        });
    }

    /**
     * Set useDiv
     *
     * @param boolean $useDiv
     *
     * @return $this
     */
    public function useDiv($div = true)
    {
        $this->fromTable->useDiv($div);

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
        $this->fromTable->headersTh($th);

        return $this;
    }

    /**
     * Set table headers.
     *
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders($headers = [])
    {
        $this->fromTable->setHeaders($headers);

        return $this;
    }

    /**
     * @param Form $form
     *
     * @return $this
     */

    public function setForm(Form $form = null)
    {
        $this->form = $form;

        $this->bindSubmitted();

        return $this;
    }

    /**
     * Set table rows.
     *
     * @param array $rows
     *
     * @return $this
     */
    public function setRows($rows = [])
    {
        if (!is_array($rows) && !$rows instanceof TableRow) {
            throw new \Exception('Rows format error!');
        }

        $rows = $rows instanceof TableRow ? [$rows] : $rows;

        $this->rows = array_merge($this->rows, $rows);

        $formatId = '';

        foreach ($this->rows as $row) {

            $row->setTable($this->fromTable);

            foreach ($row->geFields() as $field) {

                $field->setForm($this->form);

                $formatId .= $this->formatId($field->column());
            }

            $row->bindRows();
        }

        if (strlen($formatId) > 20) {
            $formatId = substr($formatId, 20);
        }

        $this->setErrorKey($formatId);

        $this->id = $formatId;

        return $this;
    }

    /**
     * Set table style.
     *
     * @param array $style
     *
     * @return $this
     */
    public function tableStyle($style = [])
    {
        $this->fromTable->setStyle($style);

        return $this;
    }

    /**
     * Set table class style.
     *
     * @param array $style
     *
     * @return $this
     */
    public function tableClass($style = [])
    {
        $this->fromTable->class($this->defaultClass . implode(' ', $style));
        return $this;
    }

    /**
     * get inner FromTable
     *
     * @return FromTable
     */
    public function getFromTable()
    {
        return $this->fromTable;
    }

    /**
     * Get validator for this field.
     *
     * @param array $input
     *
     * @return bool|Validator
     */
    public function getValidator(array $input)
    {
        return $this->validatFields($input);
    }

    /**
     * Get validator form fields.
     *
     * @param [type] $input
     * @return void
     */
    public function validatFields($input)
    {
        $collectValidator = new CollectValidator;

        foreach ($this->rows as $row) {

            foreach ($row->geFields() as $field) {

                $collectValidator->pushField($field);
            }
        }

        return $collectValidator->validationMessages($input, $this->getErrorKey());
    }

    /**
     * Get fields of this.
     *
     * @return array
     */
    public function getFields()
    {
        $fields = [];

        foreach ($this->rows as $row) {

            foreach ($row->geFields() as $field) {
                $fields[] = $field;
            }
        }

        return $fields;
    }

    /**
     * Fill data to the field.
     *
     * @param array $data
     *
     * @return void
     */
    public function fill($data)
    {
        $this->fillFields($data);
    }

    /**
     * Fill data to the fields.
     *
     * @param [type] $data
     * @return void
     */
    public function fillFields($data)
    {
        foreach ($this->rows as $row) {

            foreach ($row->geFields() as $field) {
                $field->fill($data);
            }
        }
    }

    /**
     * Build fields
     *
     * @return void
     */
    protected function buildRows()
    {
        if (!$this->id) {
            $this->setRows();
        }

        foreach ($this->rows as $row) {

            foreach ($row->geFields() as $field) {

                if (!$this->fromTable->usingDiv()) {

                    if (!$field instanceof Show) {
                        $field->setLabelClass(['hidden'])->attribute(['title' => $field->label()]);
                    }

                    $field->setWidth(12, 0);
                } else {

                    $row->autoSpan();
                }
            }
        }

        $this->fromTable->setRows($this->rows);
    }

    /**
     * Create a row
     *
     * @return void
     */
    public function row(Closure $callback)
    {
        $tableRow = new TableRow();

        call_user_func($callback, $tableRow);

        $this->rows[] = $tableRow;
    }

    /**
     * Render this filed.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $this->buildRows();

        $this->addVariables([
            'table' => $this->fromTable->render(),
        ]);

        return view($this->getView(), $this->variables());
    }
}
