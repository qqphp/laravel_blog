<?php

namespace Ichynul\Configx\Tools;

use Encore\Admin\Facades\Admin;
use Ichynul\Configx\ConfigxModel;

class Tree
{
    protected static $tree;

    protected static $tableFields;

    public static function getTree()
    {
        return static::$tree;
    }

    public static function getTableFields()
    {
        return static::$tableFields;
    }

    public static function getConfigTabs($tabs, $cx_options = [])
    {
        $check_permission = Tool::checkPermission();

        foreach ($tabs as $key => &$value) {
            if ($check_permission && !Admin::user()->can('confix.tab.' . $key)) {
                continue;
            }
            $subs = ConfigxModel::group($key);
            if ($cx_options) {
                $subs = Tool::sortGroupConfigs($subs, $cx_options);
            }

            static::$tree[$value] = [];

            if (empty($subs)) {
                continue;
            }
            foreach ($subs as $val) {
                if (!isset($cx_options[$val['name']])) {
                    $cx_options[$val['name']] = [
                        'options' => [],
                        'element' => 'normal',
                        'help' => '',
                        'name' => '',
                        'order' => 999,
                    ];
                }
                if (preg_match('/\$admin\$/i', $val['name'])) {
                    $old = $val['name'];
                    $new = preg_replace('/\$admin\$/i', 'admin_' . Admin::user()->id, $old);
                    $val = ConfigxModel::firstOrCreate(
                        ['name' => $new],
                        [
                            'description' => trans('admin.configx.' . $val['name']) . ' for admin-' . Admin::user()->id,
                            'value' => '1',
                        ]
                    );
                    $val['name'] = $old;
                }
                if (preg_match('/admin_\d+?/i', $val['name'])) {
                    continue;
                }
                $val['etype'] = $cx_options[$val['name']]['element'];

                if (isset($cx_options[$val['name']]['table_field'])) {

                    static::$tableFields[$val['name']] = $val;
                    continue;
                }
                static::$tree[$value][] = $val;
            }
        }
    }

    public static function buildTree($id = 0, $cx_options = [])
    {
        $tree = static::$tree;
        $tableFields = static::$tableFields;

        $editTitle = trans('admin.edit');
        $deleteTitle = trans('admin.delete');
        $saveTitle = trans('admin.save');
        $tabsEdit = !Tool::checkPermission() || Admin::user()->can('confix.tab.' . 'tabs_config') ?
        admin_base_path('configx/edit/' . $id) . '?do=tabs_config' : '';

        foreach ($tree as &$fields) {
            foreach ($fields as &$field) {

                if (!key_exists($field['name'], $cx_options)) {
                    $cx_options[$field['name']] = [];
                }

                $options = array_get($cx_options[$field['name']], 'options', []);

                $label = array_get($cx_options[$field['name']], 'name');
                if (!$label) {
                    $label = trans('admin.configx.' . $field['name']);
                }
                $field['label'] = $label;
                $field['options'] = $options;
                $field['href'] = admin_base_path('configx/edit/' . $field['id']) . '?do=new_config';
                $field['type_name'] = trans('admin.configx.element.' . $field['etype']);
                if ($field['etype'] == 'normal' && isset($options['__element__'])) {
                    $field['type_name'] .= '+';
                }

                if (preg_match('/\$admin\$/i', $field['name'])) {
                    $etype = $field['etype'];
                    $field = ConfigxModel::firstOrCreate(
                        ['name' => $field['name']],
                        [
                            'description' => trans('admin.configx.' . $field['name']),
                            'value' => 'do not delete',
                        ]
                    );
                    $field['etype'] = $etype;
                }
                if ($field['etype'] == 'table') {
                    $tableInfo = json_decode($field['description'], 1);
                    if ($tableInfo) {
                        $tds = [];
                        foreach ($tableInfo as $tk => $tv) {
                            if (!isset($tableFields[$tk])) {
                                continue;
                            }
                            $tds[$tk] = $tableFields[$tk];
                            $toptions = [];
                            if (isset($cx_options[$tk])) {
                                $toptions = array_get($cx_options[$tk], 'options', []);
                            }
                            $label = array_get($cx_options[$tk], 'name');
                            if (!$label) {
                                $label = trans('admin.configx.' . $tk);
                            }
                            $tds[$tk]['label'] = $label;
                            $tds[$tk]['href'] = admin_base_path('configx/edit/' . $tableFields[$tk]['id']) . '?do=new_config';
                            $tds[$tk]['options'] = $toptions;
                            $tds[$tk]['type_name'] = trans('admin.configx.element.' . $tableFields[$tk]['etype']);
                            if ($tableFields[$tk]['etype'] == 'normal' && isset($toptions['__element__'])) {
                                $tds[$tk]['type_name'] .= '+';
                            }
                        }
                        $field['tds'] = $tds;
                    }
                }
            }
        }

        return view('configx::tree', [
            'current_id' => $id,
            'tree' => $tree,
            'editTitle' => $editTitle,
            'deleteTitle' => $deleteTitle,
            'saveTitle' => $saveTitle,
            'tabsEdit' => $tabsEdit,
            'call_back' => admin_base_path('configx/sort'),
            'del_url' => admin_base_path('config'),
            'deleteConfirm' => trans('admin.delete_confirm'),
            'confirm' => trans('admin.confirm'),
            'cancel' => trans('admin.cancel'),
        ]);
    }
}
