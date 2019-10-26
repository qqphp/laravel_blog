<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Traits\AdminBuilder;

class BlogNav extends Model
{
    use ModelTree, AdminBuilder;
    protected $table = 'blog_nav';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('nav_pid');
        $this->setOrderColumn('nav_sort');
        $this->setTitleColumn('nav_title');
    }

    public function getTree()
    {
        $get_data = BlogNav::orderBy('id', 'asc')->get()->toArray();
        return modelTree($get_data);
    }
}
