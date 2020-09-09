<?php

namespace ShareManT\EditorMd;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class EditorMdServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(EditorMd $extension)
    {
        if (! EditorMd::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-ext-editormd');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/editormd')],
                'laravel-admin-ext-editormd'
            );
        }

        Admin::booting(function () {
            Form::extend('editormd', Editor::class);
        });

    }
}