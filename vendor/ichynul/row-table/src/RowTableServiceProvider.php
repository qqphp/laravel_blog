<?php

namespace Ichynul\RowTable;

use Encore\Admin\Form;
use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class RowTableServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(TableExtension $extension)
    {
        if (!TableExtension::boot()) {
            return;
        }

        if ($views = $extension->views()) {
            
            $this->loadViewsFrom($views, $extension->name);
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {

            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/row-table')],
                'row-table'
            );
        }

        Admin::booting(function () {

            Form::extend('rowtable', Table::class);

            Form::extend('textSmall',  \Ichynul\RowTable\Field\TextSmall::class);

            Form::extend('show',  \Ichynul\RowTable\Field\Show::class);
        });
    }
}