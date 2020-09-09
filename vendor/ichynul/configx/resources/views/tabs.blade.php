Example:
<pre>
base : Base setting
shop : Shop setting
uplaod : Upload setting
image :
</pre>
This will override `extensions.iframe-tabs.tabs` in config <code> /config/admin.php:</code>
<pre>
'extensions' => [
        'configx' => [
            // Set to `false` if you want to disable this extension
            'enable' => true,
            'tabs' => [
                'base' => 'Base',
                'shop' => 'Shop',
                'uplaod' => 'Uplaod',
                'image' => '' // if tab name is empty, get from trans : trans('admin.configx.tabs.image');
            ],
            // Whether check group permissions. 
            //if (!Admin::user()->can('confix.tab.base')) {/*hide base tab*/ } .
            'check_permission' => false
        ],
    ],
</pre>