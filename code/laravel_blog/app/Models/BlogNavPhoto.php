<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNavPhoto extends Model
{
    protected $table = 'blog_nav_photo';

    public function setPhotoJsonAttribute($image)
    {
        if (is_array($image)) {
            $this->attributes['photo_json'] = json_encode($image);
        }
    }

    public function getPhotoJsonAttribute($image)
    {
        return json_decode($image, true);
    }
}
