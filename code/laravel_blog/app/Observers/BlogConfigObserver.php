<?php

namespace App\Observers;

use Encore\Admin\Config\ConfigModel;

class BlogConfigObserver
{
    /**
     * Handle the config model "created" event.
     *
     * @param  Encore\Admin\Config\ConfigModel  $configModel
     * @return void
     */
    public function created(ConfigModel $configModel)
    {
    }

    /**
     * Handle the config model "updated" event.
     *
     * @param  Encore\Admin\Config\ConfigModel  $configModel
     * @return void
     */
    public function updated(ConfigModel $configModel)
    {
    }

    /**
     * Handle the config model "deleted" event.
     *
     * @param  Encore\Admin\Config\ConfigModel  $configModel
     * @return void
     */
    public function deleted(ConfigModel $configModel)
    {
    }

    /**
     * Handle the config model "restored" event.
     *
     * @param  Encore\Admin\Config\ConfigModel  $configModel
     * @return void
     */
    public function restored(ConfigModel $configModel)
    {
    }

    /**
     * Handle the config model "force deleted" event.
     *
     * @param  Encore\Admin\Config\ConfigModel  $configModel
     * @return void
     */
    public function forceDeleted(ConfigModel $configModel)
    {
    }
}
