<?php

namespace Ichynul\Configx\Tools;

use Ichynul\Configx\ConfigxModel;
use Ichynul\RowTable\Field\Collect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class Updater
{
    public static function saveConfigOptions($id = 0, $request)
    {
        $cx_options = static::cxOptions();

        $result = static::saveOptions($id, $cx_options, $request);

        if ($result instanceof Response) {
            return $result;
        }

        static::cxSave($result);

        if ($id > 0) {
            admin_toastr(trans('admin.update_succeeded'));
            return redirect()->to(admin_base_path('configx/edit/' . $id) . '?do=new_config');
        } else {
            admin_toastr(trans('admin.save_succeeded'));
            return redirect()->to(admin_base_path('configx/edit/0') . '?do=new_config');
        }
    }

    public static function saveTabsOptions($id = 0, $tabs_options)
    {
        $cx_options = static::cxOptions();

        $c_options = explode(PHP_EOL, $tabs_options);
        $arr = [];
        foreach ($c_options as $op) {
            $kv = explode(":", $op);
            if (empty($kv[0])) {
                continue;
            }
            if (count($kv) > 1) {
                $arr[trim($kv[0])] = trim($kv[1]);
            } else {
                $arr[trim($kv[0])] = '';
            }
        }
        $cx_options['__configx_tabs__']['options'] = $arr;

        static::cxSave($cx_options);

        admin_toastr(trans('admin.save_succeeded'));

        Session::put('tabindex', '0');

        return redirect()->to(admin_base_path('configx/edit/' . $id) . '?do=tabs_config');
    }

    public static function saveConfigs($id = 0, $request)
    {
        $cx_options = static::cxOptions();

        $tabs = Tool::tabs($cx_options);

        Session::put('tabindex', $request->input('tabindex', 0));

        Tree::getConfigTabs($tabs, $cx_options);

        $rootConfigs = array_values(Tree::getTree());

        $data = $request->all();

        $failedValidators = [];

        $fields = [];

        foreach ($rootConfigs as $root) {

            foreach ($root as $val) {

                $field = Builder::getConfigField($cx_options, $val, Builder::UPDATE);

                $fields[] = $field;

                if ($field instanceof Collect) {
                    $subFields = $field->getFields();

                    foreach ($subFields as $sub) {
                        $fields[] = $sub;
                    }
                }

                $validator = $field->getValidator($data);

                if ($validator && ($validator instanceof Validator) && !$validator->passes()) {

                    $errors[] = $val['name'];

                    $failedValidators[] = $validator;
                }
            }
        }

        $prepare = Tool::prepareUpdate($fields, $data);

        \DB::beginTransaction();

        foreach ($prepare as $column => $value) {

            static::saveValue($column, $value);
        }

        static::cxSave($cx_options);

        \DB::commit();

        $message = Tool::mergeValidationMessages($failedValidators);

        admin_toastr(trans('admin.update_succeeded'));

        if ($message->any()) {

            static::getErrorIndex($errors[0], $failedValidators[0]->messages()->first(), $cx_options);

            return redirect()->to(admin_base_path('configx/edit/' . $id))->withErrors($message->getMessages())->withInput();
        }

        return redirect()->to(admin_base_path('configx/edit/' . $id));
    }

    protected static function getErrorIndex($first, $msg, $cx_options)
    {
        admin_warning('Error', $msg);

        $tabs = Tool::tabs($cx_options);
        $tab = explode('.', $first);
        if (count($tabs) && count($tab)) {
            $errorKey = $tab[0];
            $i = 0;
            foreach ($tabs as $k => $v) {
                if ($k == $errorKey) {
                    Session::put('tabindex', $i);
                    break;
                }
                $i += 1;
            }
        }
    }

    protected static function saveValue($columns, $value)
    {
        if ($value == null || $value == '') {
            return;
        }

        $key = $columns;

        if (is_array($columns)) {

            $key = array_values($columns)[0];
        }

        $id = preg_replace('/^c_(\d+)_/i', '$1', $key);

        $config = ConfigxModel::findOrFail($id);

        $config->value = $value;
        $config->update();
    }

    public static function saveOptions($id = 0, $cx_options, Request $request)
    {
        if (empty($request->values['c_type']) || empty($request->values['c_key'])) {
            admin_warning('Error', trans('admin.input') . ' ' . trans('admin.configx.new_config_type') . ' / ' . trans('admin.configx.new_config_key'));
            return redirect()->back()->withInput();
        }
        $config = [];
        $defaultVal = "1";
        if ($id > 0) {
            $config = ConfigxModel::findOrFail($id);
            $new_key = $config['name'];
        } else {
            $new_key = $request->values['c_key'];
            if (!preg_match('/^' . $request->values['c_type'] . '\.\w{1,}/', $new_key)) {
                $new_key = $request->values['c_type'] . '.' . $new_key;
            }
            if (ConfigxModel::where('name', $new_key)->first()) {
                admin_warning('Error', "The key `{$new_key}` exists in table.");
                return redirect()->back()->withInput();
            }
            if ($request->values['c_element'] == "date") {
                $defaultVal = "2019-01-01";
            } else if ($request->values['c_element'] == "datetime") {
                $defaultVal = "2019-01-01 01:01:01";
            } else if ($request->values['c_element'] == "icon") {
                $defaultVal = "fa-code";
            } else if ($request->values['c_element'] == "color") {
                $defaultVal = "#ccc";
            } else if ($request->values['c_element'] == "multiple_image") {
                $defaultVal = '-';
            }
        }
        if (!isset($cx_options[$new_key])) {
            $cx_options[$new_key] = [
                'options' => [],
                'element' => '',
                'help' => '',
                'name' => '',
                'order' => 999,
            ];
        }
        $table_field = isset($cx_options[$new_key]['table_field']);
        $order = array_get($cx_options[$new_key], 'order', 999);
        if (!empty($request->values['c_options'])) {
            $c_options = explode(PHP_EOL, $request->values['c_options']);
            $arr = [];
            foreach ($c_options as $op) {
                $kv = explode(":", $op);
                if (empty($kv[0])) {
                    continue;
                }
                if (count($kv) == 2) {
                    $arr[trim($kv[0])] = trim($kv[1]);
                } else if (count($kv) > 2) {
                    $values = array_slice($kv, 1);
                    $arr[trim($kv[0])] = trim(implode(':', $values));
                } else {
                    $arr[trim($kv[0])] = trim($kv[0]);
                }
            }
            $cx_options[$new_key] = ['options' => $arr, 'element' => $request->values['c_element'], 'help' => $request->values['c_help'], 'name' => $request->values['c_name'], 'order' => 999];
            $keys = array_keys($arr);
            if ($request->values['c_element'] == "table") {
                $defaultVal = 'do not delete';
            } else if (in_array(
                $request->values['c_element'],
                ['radio_group', 'checkbox_group', 'select', 'multiple_select', 'listbox']
            ) && $keys) {
                $defaultVal = $keys[0];
            }
        } else {
            if (in_array($request->values['c_element'], ['radio_group', 'checkbox_group', 'select', 'table', 'multiple_select', 'listbox'])) {
                admin_warning('Error', "The options is empty!");
                return redirect()->back()->withInput();
            } else {
                $cx_options[$new_key] = ['options' => [], 'element' => $request->values['c_element'], 'help' => $request->values['c_help'], 'name' => $request->values['c_name'], 'order' => 999];
            }
        }
        if ($request->values['c_element'] == 'table' && empty($request->table)) {
            admin_warning('Error', "Build table befor save!");
            return redirect()->back()->withInput();
        }
        if ($id == 0) {
            if (preg_match('/\$admin\$/i', $new_key)) {
                $defaultVal = 'do not delete';
            }
            $data = ['name' => $new_key, 'value' => $defaultVal, 'description' => $request->values['c_name'] ?: trans('admin.configx.' . $new_key)];
            if ($request->values['c_element'] == "table") {
                $table = Tool::checkTableKeys($new_key, $request->table);
                $cx_options = Tool::createTableConfigs($table, $cx_options);
                $data['description'] = json_encode($table);
            }
            $config = new ConfigxModel($data);
            $config->save();
            $c_type = $request->values['c_type'];
        } else {
            $data = ['name' => $new_key];
            if ($request->values['c_element'] == "table") {
                $table = Tool::checkTableKeys($new_key, $request->table);
                $cx_options = Tool::createTableConfigs($table, $cx_options);
                $data['description'] = json_encode($table);
            }
            $config->update($data);
            $c_type = $config->getPrefix();
        }
        $tabs = Tool::tabs($cx_options);
        if (count($tabs)) {
            $i = 0;
            foreach ($tabs as $k => $v) {
                if ($k == $c_type) {
                    Session::put('tabindex', $i);
                    break;
                }
                $i += 1;
            }
        }
        if ($table_field) {
            $cx_options[$new_key]['table_field'] = 1;
        }
        if ($order) {
            $cx_options[$new_key]['order'] = $order;
        }

        $cx_options = Tool::sortTGroupOptions($c_type, $cx_options);

        return $cx_options;
    }

    protected static function cxOptions()
    {
        $__configx__ = Tool::getConfigx();

        $cx_options = [];

        if ($__configx__ && $__configx__['description']) {

            $cx_options = json_decode($__configx__['description'], 1);
        }

        return $cx_options;
    }

    protected static function cxSave($cx_options)
    {
        $__configx__ = Tool::getConfigx();

        $cx_options = Tool::remove($cx_options);
        $__configx__['description'] = json_encode($cx_options);
        $__configx__->save();
    }
}
