<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNavMusic extends Model
{
    protected $table = 'blog_nav_music';

    public function setMusicJsonAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['music_json'] = json_encode($pictures);
        }
    }

    public function getMusicJsonAttribute($pictures)
    {
        return json_decode($pictures, true);
    }
}
