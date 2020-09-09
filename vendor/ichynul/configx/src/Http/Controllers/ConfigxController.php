<?php

namespace Ichynul\Configx\Http\Controllers;

use Ichynul\Configx\ConfigxModel;
use Ichynul\Configx\Tools\Displayer;
use Ichynul\Configx\Tools\Tool;
use Ichynul\Configx\Tools\Updater;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConfigxController extends Controller
{
    public function edit($id = 0, Request $request)
    {
        $do = $request->input('do');

        $__configx__ = Tool::getConfigx();

        $cx_options = [];

        if ($__configx__ && $__configx__['description']) {

            $cx_options = json_decode($__configx__['description'], 1);
        }

        $tabs = Tool::tabs($cx_options);

        if ($do == 'backup') {

            $this->backUp($__configx__);

            $do = 'new_config';
        }

        if ($do == 'new_config') {

            return Displayer::newConfig($id, $cx_options, $tabs);

        } else if ($do == 'tabs_config') {

            return Displayer::tabsConfig($id, $cx_options, $tabs);
        }

        return Displayer::editConfigs($id, $cx_options, $tabs);
    }

    public function saveall($id = 0, Request $request)
    {
        $do = $request->input('do');

        if ($do == 'tabs_config') {

            return Updater::saveTabsOptions($id, $request->values['c_tabs_options']);
        }

        if ($do == 'new_config' || $do == 'backup') {

            return Updater::saveConfigOptions($id, $request);
        }

        return Updater::saveConfigs($id, $request);
    }

    public function postSort(Request $request)
    {
        $__configx__ = Tool::getConfigx();

        $cx_options = [];
        
        if ($__configx__ && $__configx__['description']) {

            $cx_options = json_decode($__configx__['description'], 1);
        }

        $data = $request->input('data');

        $i = 0;
        foreach ($data as $s) {
            $i += 5;
            $id = $s['id'];
            $config = ConfigxModel::findOrFail($id);
            if (isset($cx_options[$config['name']])) {
                $cx_options[$config['name']]['order'] = $i;
            } else {
                $cx_options[$config['name']] = ['options' => [], 'element' => 'normal', 'help' => '', 'name' => '', 'order' => $i];
            }
        }
        $cx_options = Tool::remove($cx_options);
        $__configx__['description'] = json_encode($cx_options);
        $__configx__->save();
        return response()->json(['status' => 1, 'message' => trans('admin.update_succeeded')]);
    }

    protected function backUp($__configx__)
    {
        if ($__configx__ && $__configx__['description']) {
            app('files')->put(
                storage_path('app/public/configx.json'),
                $__configx__['description']
            );

            admin_success(trans('admin.succeeded'), "Configx options save to : /wwwroot/storage/app/public/configx.json");
        } else {
            admin_warning(trans('admin.failed'), "Configx options is empty!");
        }
    }
}
