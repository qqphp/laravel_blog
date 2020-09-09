<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class GoArticle extends RowAction
{
    public $name = '管理';

    /**
     * @return string
     */
    public function href()
    {
        return $this->getRow()->getOriginal('nav_action');
    }

}