## 2019 年 4 月 10 日

#1.0.18

- 1. If tab name is empty , get from trans : `trans("admin.configx.tabs.{$tabkey}")`;

  tab 名称留空则从翻译中获取

```php
    'extensions' => [
        'configx' => [
            // *****
            'tabs' => [
                'base' => '基本设置',
                'shop' => '店铺设置',
                'uplaod' => '上传设置',
                'image' => '' // if tab name is empty , get from trans : trans('admin.configx.tabs.image'); 留空则从翻译中获取名称
            ],
            // *****
        ],
    ],

```

- 2. When adding or editing a config , you can type in a `config_name` optionaly,

     if `new_config_name` is empty, get from trans : `trans("admin.configx.{$tab}.{$config_key}")`;

     添加或编辑配置信息时，可以输入配置名称，如若留空，则从翻译中获取

## 2019 年 3 月 22 日

New feature support varable key some\_$admin$\_str.
新特性,支持在 key 中插入可变的$admin$

# demo

Add 2 config keys :

```
base.skin_$admin$
    element type    : radio_group
    options :
        skin-blue
        skin-blue-light
        skin-yellow
        skin-yellow-light
        skin-green
        skin-green-light
        skin-purple
        skin-purple-light
        skin-red
        skin-red-light
        skin-black
        skin-black-light

base.layout_$admin$
    element type    : checkbox_group
    options :
        fixed
        layout-boxed
        layout-top-nav
        sidebar-collapse
        sidebar-mini
```

Then add some codes at `Admin/bootstrap.php` :

```php
if(Admin::user())
{
    config(
    [
        'admin.skin' => config('base.skin_admin_' . Admin::user()->id, 'skin-blue'),
        'admin.layout' => explode(',', config('base.layout_admin_' . Admin::user()->id, 'fixed')),
    ]
    );
}
```
