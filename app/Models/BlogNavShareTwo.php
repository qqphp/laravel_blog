<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNavShareTwo extends Model
{
    protected $table = 'blog_nav_share2';

    /**
     * Desc:关联导航
     * Date:2019/9/4/004
     */
    public function nav_name()
    {
        return $this->belongsTo(BlogNav::class, 'nav_id');
    }
}
