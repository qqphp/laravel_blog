<?php

namespace Ichynul\RowTable;

use Encore\Admin\Form;
use Encore\Admin\Form\Field;

class TableRow
{
    /**
     * @var array
     */
    protected $col_spans = [];

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @var boolean
     */
    protected $bind_rows = false;

    /**
     * @var FormTable
     */
    protected $table = false;

    /**
     * Get rows
     *
     * @return array
     */
    public function geFields()
    {
        return $this->fields;
    }

    /**
     * @param Field $field
     *
     * @return $this
     */
    public function pushField(Field $field, $colspan = 1)
    {
        $field->column();

        $label = $field->label();

        if ($this->bind_rows) {

            admin_error('Error', "Don not pushField '{$label}' after \$table->setRows(\$tableRow) was called!");

            return $this;
        }

        $this->fields[] = $field;

        $this->col_spans[$field->column()] = is_numeric($colspan) ? $colspan : 1;

        return $this;
    }

    /**
     * @return $this
     */
    public function bindRows()
    {
        $this->bind_rows = true;

        return $this;
    }

    /**
     * Auto set Width 
     * @return $this
     */
    public function autoSpan()
    {
        $defaults = 0;

        $use = 0;

        foreach ($this->fields as $field) {

            $width = $this->getSpan($field->column());

            if ($width == 1) {

                $defaults += 1;
            }

            $use += $width;
        }

        $rows = count($this->fields);

        if ($defaults == $rows) {

            $this->col_spans = [];

            foreach ($this->fields as $field) {

                if ($rows >= 4) {

                    $this->col_spans[$field->column()] = 3;

                    $field->setWidth(6, 6);
                } else if ($rows == 3) {

                    $this->col_spans[$field->column()] = 4;

                    $field->setWidth(8, 4);
                } else if ($rows == 2) {

                    $this->col_spans[$field->column()] = 6;

                    $field->setWidth(8, 2);
                } else {

                    $this->col_spans[$field->column()] = 12;

                    $field->setWidth(10, 2);
                }
            }
        }

        return $this;
    }

    /**
     * get rwo_span of column
     *
     * @return int
     */
    public function getSpan($column)
    {
        if (empty($this->col_spans)) {
            return 1;
        }

        if (!array_key_exists($column, $this->col_spans)) {
            return 1;
        }

        return $this->col_spans[$column] ?: 1;
    }

    /**
     * set col_spans 
     *
     * @return $this
     */
    public function setcolspans(array $col_spans)
    {
        $this->col_spans = $col_spans;
        return $this;
    }

    /**
     * set table 
     *
     * @return $this
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Generate a Field object and add to form builder if Field exists.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return Field
     */
    public function __call($method, $arguments)
    {
        if ($className = Form::findFieldClass($method)) {

            $column = array_get($arguments, 0, '');

            $arguments = array_slice($arguments, 1);

            $label = array_get($arguments, 0, '');

            $element = new $className($column, [is_numeric($label) ? $column : $label]);

            if (!$this->bind_rows) {

                $colspan = count($arguments) > 1 ? array_get($arguments, 1, 1) : array_get($arguments, 0, 1);

                $colspan = is_numeric($colspan) ? $colspan : 1;

                $element->setWidth(8, 4);

                $this->pushField($element, $colspan);

                return $element;
            }

            $args = $label ? "'{$column}', '$label'" : "$column";

            admin_error('Error', "Don not call \$tableRow->{$method}('{$args}') after \$table->setRows(\$tableRow) was called!");

            return new Field\Nullable();
        }

        admin_error('Error', "Field type [$method] does not exist.");

        return new Field\Nullable();
    }
}
