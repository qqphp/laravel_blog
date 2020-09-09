<?php

namespace Ichynul\Configx\Tools;

use Encore\Admin\Form;
use Encore\Admin\Form\Field\Html;
use Encore\Admin\Form\Field\Radio;
use Encore\Admin\Form\Field\Text;
use Encore\Admin\Form\Field\Textarea;
use Ichynul\Configx\Configx;
use Ichynul\Configx\ConfigxModel;
use Ichynul\RowTable\Table;
use Ichynul\RowTable\TableRow;

class Builder
{
    public const EDIT = 1;
    public const UPDATE = 2;

    public static function createField($val, $cx_options = [])
    {
        if (!isset($cx_options[$val['name']])) {
            $cx_options[$val['name']] = [
                'options' => [],
                'element' => 'normal',
                'help' => '',
                'name' => '',
                'order' => 999,
            ];
        }

        $field = static::getConfigField($cx_options, $val, static::EDIT);

        if (in_array($val['id'], ['type', 'key', 'element'])) {
            $field->setLabelClass(['asterisk']);
        }

        if (isset($cx_options[$val['name']]['options'])) {
            $options = array_get($cx_options[$val['name']], 'options', []);
            if (isset($options['divide'])) {
                if ($options['divide'] == 'befor') {
                    return '<hr style="width: 99%;">' . $field->render();
                } else {
                    return $field->render() . '<hr style="width: 90%;">';
                }
            }
        }
        return $field->render();
    }

    public static function createNewConfigForm($val, $tabs, $cx_options = [], $config = [])
    {
        if (!isset($cx_options[$val['name']])) {
            $cx_options[$val['name']] = [];
        }

        $label = trans('admin.configx.' . $val['name']);

        if ($config) {
            $editName = $config['name'];
        }

        $rowname = 'values.c_' . $val['id'];

        if ($val['id'] == 'type') {
            if ($config) {
                $field = new Text($rowname, [$label]);
                $field->readOnly();
                $typekey = explode('.', $editName)[0];
                $typename = array_get($tabs, $typekey);
                if (empty($typename)) {
                    $typename = trans('admin.configx.tabs.' . $typekey); // if tab name is empty , get from trans
                }
                if (isset($cx_options[$config['name']]['table_field'])) {
                    $tableKey = preg_replace('/^(\w+?\.\w+?)_\d+_\d+$/i', '$1', $editName);
                    if ($cx_options && isset($cx_options[$tableKey]) && isset($cx_options[$tableKey]['name'])) {
                        $typename .= '-' . $cx_options[$tableKey]['name'];
                    } else {
                        $typename .= '-' . trans('admin.configx.' . $tableKey);
                    }
                }
                $field->value($typename);
                //
            } else {
                $field = new Radio($rowname, [$label]);

                $field->options($tabs)
                    ->setWidth(9, 2);
            }
        } else if ($val['id'] == 'key' || $val['id'] == 'tabs_key') {
            $field = new Text($rowname, [$label]);

            if ($val['id'] == 'tabs_key') {
                $field->value('__configx_tabs__');
                $field->readOnly();
            } else {
                if ($config) {
                    $field->readOnly();
                    $field->value($editName);
                }
            }
        } else if ($val['id'] == 'name') {
            $field = new Text($rowname, [$label]);
            if ($config) {
                if ($config && isset($cx_options[$config['name']]['name'])) {
                    $field->value($cx_options[$config['name']]['name']);
                }
            }
        } else if ($val['id'] == 'element') {
            $field = new Radio($rowname, [$label]);
            $elements = [
                'normal', 'date', 'time', 'datetime', 'image', 'multiple_image', 'password', 'file', 'multiple_file',
                'yes_or_no', 'rate', 'editor', 'tags', 'icon', 'color', 'number', 'table', 'textarea',
                'radio_group', 'checkbox_group', 'listbox', 'select', 'multiple_select', 'map',
            ];
            if ($config && isset($cx_options[$config['name']]['table_field'])) {
                array_delete($elements, 'table');
            }
            $support = [];
            foreach ($elements as $el) {
                $support[$el] = trans('admin.configx.element.' . $el);
            }
            $field->options($support)
                ->default('normal')
                ->setWidth(9, 2);
            if ($config && isset($cx_options[$config['name']]['element'])) {
                $field->value($cx_options[$config['name']]['element']);
            }
        } else if ($val['id'] == 'help') {
            $field = new Text($rowname, [$label]);
            if ($config && isset($cx_options[$config['name']]['help'])) {
                $field->value($cx_options[$config['name']]['help']);
            }
        } else if ($val['id'] == 'options' || $val['id'] == 'tabs_options') {
            $field = new Textarea($rowname, [$label]);
            $table = \Request::old('table');
            if (
                !$table && $config && isset($cx_options[$config['name']]['element'])
                && $cx_options[$config['name']]['element'] == 'table'
                && $config['description']
            ) {
                $table = json_decode($config['description']);
            }
            if ($val['id'] == 'options') {
                $field->help(view('configx::tips', ['table' => $table]));
                if ($config && isset($cx_options[$config['name']]['options'])) {
                    $arr = [];
                    foreach ($cx_options[$config['name']]['options'] as $k => $v) {
                        if ($k == $v) {
                            $arr[] = $k;
                        } else {
                            $arr[] = $k . '  :  ' . $v;
                        }
                    }
                    $field->value(implode(PHP_EOL, $arr));
                }
            } else {
                $field->help(view('configx::tabs'));
                $tabs = Configx::config('tabs', ['base' => 'Base']);
                if (isset($cx_options['__configx_tabs__']) && isset($cx_options['__configx_tabs__']['options'])) {
                    $tabs = !empty($cx_options['__configx_tabs__']['options']) ? $cx_options['__configx_tabs__']['options'] : $tabs;
                }
                $arr = [];
                foreach ($tabs as $k => $v) {
                    $arr[] = $k . '  :  ' . $v;
                }
                $field->value(implode(PHP_EOL, $arr));
            }

            $field->rows(5);
        }

        if (in_array($val['id'], ['type', 'key', 'element'])) {
            $field->setLabelClass(['asterisk']);
        }

        return $field->render();
    }

    public static function getConfigField($cx_options = [], $val, $mode)
    {
        $rowname = 'c_' . $val['id'] . '_';

        $label = array_get($cx_options[$val['name']], 'name', '');
        if (!$label) {
            $label = trans('admin.configx.' . $val['name']);
        }

        if (!key_exists($val['name'], $cx_options)) {
            $cx_options[$val['name']] = [];
        }

        $etype = array_get($cx_options[$val['name']], 'element', 'normal');
        $options = array_get($cx_options[$val['name']], 'options', []);

        //create field
        if ($etype == 'table') {
            if (
                $val['description'] && isset($options['rows'])
                && isset($options['cols'])
            ) {
                $field = static::buildTable($val, $label, $options, $cx_options, $mode);
            } else {
                $field = new html('Table error cols and rows is required.', [$label]);
            }
            return $field;
        }

        $trueType = static::trueType($etype, $options);

        if ($etype == 'map') {
            $field = static::findField($trueType, $rowname . 'lat', [$rowname . 'lng', $label]);
        } else {
            $field = static::findField($trueType, $rowname, [$label]);
        }

        if (!$field) {
            if ($etype == 'editor') {
                $field = new Textarea($rowname, [$label]);
            } else {
                $field = new Text($rowname, [$label]);
            }

            $msg = '';

            if ($etype == 'editor') {

                $msg = 'editor[' . array_get($options, 'editor_name', 'editor') . ']';

            } else if ($etype == 'normal') {

                $msg = '[' . array_get($options, '__element__', 'text') . ']';
            } else {
                $msg = '[' . $etype . ']';
            }

            $field->help('<span class="label label-warning">The ' . $msg . ' is unuseable!</span>');

            unset($cx_options[$val['name']]['help']);

            $options = [];
        }

        //init field
        if ($etype == 'textarea') {

            if (isset($options['rows'])) {
                $field->rows($options['rows']);
            }
        } else if ($etype == 'yes_or_no') {

            $field->options(['1' => trans('admin.yes'), '0' => trans('admin.no')]);
        } else if ($etype == 'number') {

            if (isset($options['max'])) {
                $field->max($options['max']);
            }
            if (isset($options['min'])) {
                $field->min($options['min']);
            }
        } else if (in_array($etype, ['radio_group', 'checkbox_group', 'listbox', 'select', 'multiple_select'])) {

            if (in_array($etype, ['select', 'multiple_select']) && isset($options['options_url'])) {
                $field->options($options['options_url']);
            } else {
                $field->options(Tool::optionsFilter($options));
            }
        } else if ($etype == 'color') {

            if (isset($options['format'])) {
                $field->options(['format' => $options['format']]);
            }
        }

        // fill value

        if ($mode == static::EDIT) {
            static::fillData($field, $etype, $rowname, $val['value']);
        }

        if (isset($cx_options[$val['name']]['help']) && !empty($cx_options[$val['name']]['help'])) {
            $field->help($cx_options[$val['name']]['help']);
        }

        if ($options) {

            $field = Tool::callUserfunctions($field, $options);

            if (!in_array($etype, ['image', 'file', 'multiple_image', 'multiple_file'])) {

                if ($mode == static::UPDATE) {
                    $field->rules('required');
                }
            }
            
        } else {

            if (in_array($etype, ['image', 'file', 'multiple_image', 'multiple_file'])) {

                $field->uniqueName();
            } else {
                if ($mode == static::UPDATE) {
                    $field->rules('required');
                }
            }
        }

        return $field;
    }

    protected static function fillData($field, $etype, $rowname, $value)
    {
        $columns = $field->column();

        if (is_array($columns)) {

            $values = explode(',', $value);

            $data = [];

            $i = 0;
            foreach ($columns as $name => $column) {
                $data[$column] = array_get($values, $i, '-');
                $i += 1;
            }

            $field->fill($data);

        } else if (in_array($etype, ['checkbox_group', 'multiple_select', 'listbox', 'multiple_image', 'multiple_file'])) {
            $values = array_filter(explode(',', $value));

            if ($value && count($values)) {
                $field->value($values);
            }
        } else {
            $field->fill([$rowname => $value]);
        }
    }

    protected static function buildTable($val, $label, $options, $cx_options, $mode)
    {
        $tableInfo = json_decode($val['description'], 1);
        if ($tableInfo) {
            Tool::createTableConfigs($tableInfo, $cx_options);
        }
        $field = new Table($label);
        $rows = [];
        for ($i = 0; $i < $options['rows']; $i += 1) {
            $tableRow = new TableRow();
            for ($j = 0; $j < $options['cols']; $j += 1) {
                $fieldKey = $val['name'] . '_' . $i . '_' . $j;
                if (!key_exists($fieldKey, $tableInfo)) {
                    continue;
                }
                if ($tableInfo[$fieldKey] == $fieldKey || '' == $tableInfo[$fieldKey]) {

                    $conf = ConfigxModel::where('name', $fieldKey)->first();
                    if ($conf) {

                        $etype = array_get($cx_options[$conf['name']], 'element', 'normal');

                        if ($etype == 'normal' && $options['cols'] > 8) {
                            array_set($cx_options[$conf['name']], 'element', 'textSmall');
                        }

                        if (!isset($cx_options[$conf['name']])) {
                            $cx_options[$conf['name']] = [
                                'options' => [],
                                'element' => 'normal',
                                'help' => '',
                                'name' => '',
                                'order' => 999,
                            ];
                        }

                        $tableField = static::getConfigField($cx_options, $conf, $mode);

                        $tableRow->pushField($tableField, 1);
                    }
                } else {
                    $text = $tableInfo[$fieldKey];
                    if (preg_match('/^trans\.(\w+)/i', $text, $mchs)) { //if text is trans.sometext , get from trans : trans("admin.configx.{$tab}.{$tablekey}.{$sometext}")
                        $text = trans("admin.configx.{$val['name']}.{$mchs[1]}");
                    }
                    $tableRow->show($text)->Textalign('center');
                }
            }
            $rows[] = $tableRow;
        }
        $field->setRows($rows);
        $field->setErrorKey($val['name']);

        return $field;
    }

    protected static function trueType($type, $options = [])
    {
        if ($type == 'editor') {

            $type = array_get($options, 'editor_name', 'editor');
        } else if ($type == 'normal') {

            $type = array_get($options, '__element__', 'text');
        } else if ($type == 'radio_group' || $type == 'yes_or_no') {

            $type = 'radio';
        } else if ($type == 'checkbox_group') {

            $type = 'checkbox';
        } else if ($type == 'multiple_select') {

            $type = 'multipleSelect';
        } else if ($type == 'multiple_image') {

            $type = 'multipleImage';
        } else if ($type == 'multiple_file') {

            $type = 'multipleFile';
        }

        return $type;
    }

    protected static function findField($type, $column, $args)
    {
        if ($className = Form::findFieldClass($type)) {
            $element = new $className($column, $args);

            return $element;
        }

        return null;
    }
}
