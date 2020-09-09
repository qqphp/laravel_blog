<?php

namespace Ichynul\Configx\Tools;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Form\Field\Hidden;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab as Wtab;
use Ichynul\Configx\ConfigxModel;
use Ichynul\Configx\Field\Outer;
use Ichynul\Configx\FormWgt;
use Illuminate\Support\Facades\Session;

class Displayer
{
    public static function newConfig($id = 0, $cx_options = [], $tabs)
    {
        if (Tool::checkPermission()) {

            if (!Admin::user()->can('confix.tab.' . 'new_config')) {
                return '';
            }
        }

        Tree::getConfigTabs($tabs, $cx_options);

        $config = [];
        $tab = new Wtab();

        if ($id > 0) {
            $config = ConfigxModel::findOrFail($id);
            $label = $cx_options && isset($cx_options[$config['name']]) ? array_get($cx_options[$config['name']], 'name') : '';
            if (!$label) {
                $label = trans('admin.configx.' . $config['name']);
            }
            $title = trans('admin.edit') . '-' . $label;
        } else {
            $title = trans('admin.create');
        }

        $subs = array(
            ['id' => 'type', 'name' => 'new_config_type', 'value' => ''],
            ['id' => 'key', 'name' => 'new_config_key', 'value' => ''],
            ['id' => 'name', 'name' => 'new_config_name', 'value' => ''],
            ['id' => 'element', 'name' => 'new_config_element', 'value' => ''],
            ['id' => 'help', 'name' => 'new_config_help', 'value' => ''],
            ['id' => 'options', 'name' => 'new_config_options', 'value' => ''],
        );

        $formhtml = '';

        foreach ($subs as $val) {
            $formhtml .= Builder::createNewConfigForm($val, $tabs, $cx_options, $config);
        }

        if ($id > 0) {
            $tab->add($title, '<div class="row"><div class="col-sm-9">' . $formhtml . '</div>' . Tree::buildTree($id, $cx_options) . '</div>', false);
        } else {
            $tab->add($title, '<div class="row"><div class="col-sm-9">' . $formhtml . '</div>' . Tree::buildTree($id, $cx_options) . '</div>', false);
        }
        $tab->addLink('x', admin_base_path('configx/edit/0'));

        return static::createform($tab, $id);
    }

    public static function tabsConfig($id = 0, $cx_options = [], $tabs)
    {
        if (Tool::checkPermission()) {

            if (!Admin::user()->can('confix.tab.' . 'tabs_config')) {
                return '';
            }
        }

        $tab = new Wtab();

        $title = trans('admin.edit') . '-' . trans('admin.configx.' . 'new_config_type');

        $subs = array(
            ['id' => 'tabs_key', 'name' => 'new_config_key', 'value' => ''],
            ['id' => 'tabs_options', 'name' => 'new_config_options', 'value' => ''],
        );

        $formhtml = '';

        foreach ($subs as $val) {
            $formhtml .= Builder::createNewConfigForm($val, $tabs, $cx_options);
        }

        $tab->add($title, '<div class="row"><div class="col-sm-9">' . $formhtml . '</div>' . '</div>', true);
        $tab->addLink('x', admin_base_path('configx/edit/' . $id) . '?do=new_config');

        return static::createform($tab, $id);
    }

    public static function editConfigs($id = 0, $cx_options = [], $tabs)
    {
        $tab = new Wtab();

        if (Tool::checkPermission()) {

            Tool::createPermissions($tabs);

            Tool::createPermissions(['new_config' => trans('admin.edit') . '-config']);

            Tool::createPermissions(['tabs_config' => trans('admin.edit') . '-tabs']);
        }

        Tree::getConfigTabs($tabs, $cx_options);

        $tree = Tree::getTree();

        foreach ($tree as $title => $fields) {
            $formhtml = '';
            foreach ($fields as $field) {
                $formhtml .= Builder::createField($field, $cx_options);
            }
            $tab->add($title, '<div class="row">' . $formhtml . '</div>', false);
        }

        if (!Tool::checkPermission() || Admin::user()->can('confix.tab.' . 'new_config')) {

            $tab->addLink('+', admin_base_path('configx/edit/0') . '?do=new_config');
        }

        return static::createform($tab, $id);
    }

    protected static function createform($tab, $id)
    {
        $indexField = new Hidden('tabindex', 'tabindex');
        $indexField->default(0);

        $doField = new Hidden('do', 'do');

        $form = new FormWgt(['do' => request('do', ''), 'tabindex' => Session::get('tabindex')]);

        $html = new Outer($tab->render(), []);

        $form->pushField($html);
        $form->pushField($indexField);
        $form->pushField($doField);
        $form->action(admin_base_path('configx/saveall/' . $id));
        $form->attribute('enctype', 'multipart/form-data');

        $content = new Content();

        return $content
            ->header(trans('admin.configx.header'))
            ->description(trans('admin.configx.desc'))
            ->breadcrumb(
                ['text' => trans('admin.configx.header'), 'url' => 'configx/edit'],
                ['text' => trans('admin.configx.desc')]
            )
            ->row('<div class="box box-info">' . $form->render() . '</div>')->row(view(
            'configx::script',
            [
                'call_back' => admin_base_path('configx/sort'),
                'del_url' => admin_base_path('config'),
                'deleteConfirm' => trans('admin.delete_confirm'),
                'confirm' => trans('admin.confirm'),
                'cancel' => trans('admin.cancel'),
            ]
        ));
    }
}
