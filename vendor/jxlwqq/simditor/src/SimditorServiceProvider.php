<?php

namespace Jxlwqq\Simditor;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class SimditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(SimditorExtension $extension)
    {
        if (! SimditorExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-simditor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/simditor')],
                'laravel-admin-simditor'
            );
        }

        Admin::booting(function () {
            Form::extend('simditor', Editor::class);
        });
    }
}
