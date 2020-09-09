<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogAbout extends Model
{
    protected $table = 'blog_about';

    public function article()
    {
        return $this->hasOne(BlogAboutArticle::class, 'notice_id');
    }

    public function card1()
    {
        return $this->hasMany(BlogAboutCardOne::class, 'notice_id');
    }

    public function card2()
    {
        return $this->hasMany(BlogAboutCardTwo::class, 'notice_id');
    }
}
