<?php

namespace Ichynul\Configx;

use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Config\ConfigModel;

class ConfigxModel extends ConfigModel
{
    protected $fillable = array('name', 'value', 'description');

    /**
     * Group configs by prefix
     *
     * @param [string] $prefix
     * @return void
     */
    public static function group($prefix)
    {
        return self::where('name', 'like', "{$prefix}.%")->get()->toArray();
    }

    /**
     * Get name prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        $arr = explode('.', $this->name);
        return count($arr) ? $arr[0] : '';
    }

    /**
     * Create prefix permission
     *
     * @param [string] $prefix
     * @return void
     */
    public static function createPermission($prefix, $name)
    {
        $slug = 'confix.tab.' . $prefix;
        $name = trans('admin.configx.header') . '-' . $name;
        if ($pm = Permission::where('slug', $slug)->first()) {
            if ($pm->name != $name) {
                $pm->update(['name' => $name]);
            }
            return;
        }
        Permission::create([
            'name' => $name,
            'slug' => $slug,
            'http_path' => "/configx/tab-{$prefix}",
        ]);
    }
}
