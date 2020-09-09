<?php

namespace Jxlwqq\Simditor;

use Encore\Admin\Form\Field;

class Editor extends Field
{
    protected $view = 'laravel-admin-simditor::editor';

    protected static $css = [
        'vendor/laravel-admin-ext/simditor/simditor-2.3.25/styles/simditor.css',
    ];

    protected static $js = [
        'vendor/laravel-admin-ext/simditor/simditor-2.3.25/scripts/module.js',
        'vendor/laravel-admin-ext/simditor/simditor-2.3.25/scripts/hotkeys.js',
        'vendor/laravel-admin-ext/simditor/simditor-2.3.25/scripts/uploader.js',
        'vendor/laravel-admin-ext/simditor/simditor-2.3.25/scripts/dompurify.js',
        'vendor/laravel-admin-ext/simditor/simditor-2.3.25/scripts/simditor.js',
    ];

    public function render()
    {
        $token = csrf_token();
        $config = json_encode((array)config('admin.extensions.simditor.config'));
        $this->script = <<<EOT
        $(document).ready(function(){
              var config = {$config}
              config['textarea'] = $('#{$this->id}')
              config['upload']['params'] = {_token: '{$token}'}
              var editor = new Simditor(config);
         });
EOT;
        return parent::render();
    }
}
