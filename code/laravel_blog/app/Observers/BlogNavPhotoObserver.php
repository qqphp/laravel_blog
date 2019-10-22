<?php

namespace App\Observers;

use App\Models\BlogNavPhoto;
use Illuminate\Support\Facades\Storage;

class BlogNavPhotoObserver
{
    /**
     * Handle the blog nav photo "created" event.
     *
     * @param  App\Models\BlogNavPhoto;
     * @return void
     */
    public function created(BlogNavPhoto $blogNavPhoto)
    {
        //
    }

    /**
     * Handle the blog nav photo "updated" event.
     *
     * @param  App\Models\BlogNavPhoto;
     * @return void
     */
    public function updated(BlogNavPhoto $blogNavPhoto)
    {
        //
    }

    /**
     * Handle the blog nav photo "deleted" event.
     *
     * @param  App\Models\BlogNavPhoto;
     * @return void
     */
    public function deleted(BlogNavPhoto $blogNavPhoto)
    {
        $photo_img = $blogNavPhoto->getOriginal('photo_img');
        //删除封面图
        if($photo_img){
            Storage::disk('admin')->delete($photo_img);
        }
        //删除所属相册图片
        $photo_json = $blogNavPhoto->photo_json;
        if($photo_json){
            Storage::disk('admin')->delete($photo_json);
        }
    }

    /**
     * Handle the blog nav photo "restored" event.
     *
     * @param  \App\app\Models\BlogNavPhoto  $blogNavPhoto
     * @return void
     */
    public function restored(BlogNavPhoto $blogNavPhoto)
    {
        //
    }

    /**
     * Handle the blog nav photo "force deleted" event.
     *
     * @param  \App\app\Models\BlogNavPhoto  $blogNavPhoto
     * @return void
     */
    public function forceDeleted(BlogNavPhoto $blogNavPhoto)
    {
        //
    }
}
