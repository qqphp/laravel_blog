<?php

namespace Ichynul\Configx;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Form;
use Encore\Admin\Admin;
use Ichynul\Configx\Field\TestText;

class ConfigxServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(Configx $extension)
    {
        if (!Configx::boot()) {
            return;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'configx');
        }

        $this->app->booted(function () {
            Configx::routes(__DIR__ . '/../routes/web.php');
        });

        Admin::booting(function () {

            Form::extend('test_text', TestText::class);
        });
    }
}
