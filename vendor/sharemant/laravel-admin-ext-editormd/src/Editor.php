<?php

namespace ShareManT\EditorMd;

use Encore\Admin\Form\Field;

class Editor extends Field
{
    protected $view = 'laravel-admin-ext-editormd::editor';
    protected static $css = [
        'vendor/laravel-admin-ext/editormd/editormd-1.5.0/css/editormd.min.css'
    ];
    protected static $js = [
        'vendor/laravel-admin-ext/editormd/editormd-1.5.0/js/editormd.min.js'
    ];

    public function render()
    {
        $config = json_encode((array)config('admin.extensions.editormd.config'));
        $valueType = config('admin.extensions.editormd.valueType');
        if (config('admin.extensions.editormd.dynamicMode')) {
            $this->script = <<<EOT
        var editorMd{$this->id};
        $(document).ready(function(){
            $("#editormd-create-btn-{$this->id}").click(function(){
                $(this).hide();
                var valueType = '{$valueType}';
                var config = Object.assign({id:'{$this->id}'}, {$config});
                editorMd{$this->id} = editormd(config);
                // Fix editormd V1.5.0 bug (Previewing close button default set to show when loaded).
                $("#{$this->id}").find(".editormd-preview-close-btn").hide();
                // Set the content value type.
                if( config['saveHTMLToTextarea'] ) {
                   $(".editormd-html-textarea").attr("name", '{$this->id}');
                } else {
                   $(".editormd-markdown-textarea").attr("name", '{$this->id}');
                }
            });           
        });
EOT;
        } else {
            $this->script = <<<EOT
        var editorMd{$this->id};
        var valueType = '{$valueType}';
        var config = Object.assign({id:'{$this->id}'}, {$config});
        $(document).ready(function(){
            editorMd{$this->id} = editormd(config);
            // Fix editormd V1.5.0 bug (Previewing close button default set to show when loaded).
            $(".editormd-preview-close-btn").hide();
            // Set the content value type.
            if( config['saveHTMLToTextarea'] ) {
                $(".editormd-html-textarea").attr("name", '{$this->id}');
            } else {
                $(".editormd-markdown-textarea").attr("name", '{$this->id}');
            }
        });
EOT;
        }
        return parent::render();
    }
}