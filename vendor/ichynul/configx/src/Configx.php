<?php

namespace Ichynul\Configx;

use Encore\Admin\Extension;

class Configx extends Extension
{
    public $name = 'configx';

    public $views = __DIR__ . '/../resources/views';

    public $assets = __DIR__ . '/../resources/assets';

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Configx', 'configx/edit', 'fa-toggle-on');
        parent::createPermission('Admin Configx', 'ext.configx', 'configx/*');
    }
}