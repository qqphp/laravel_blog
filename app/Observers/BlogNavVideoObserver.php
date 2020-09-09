<?php

namespace App\Observers;

use App\Models\BlogNavVideo;
use Illuminate\Support\Facades\Storage;

class BlogNavVideoObserver
{
    /**
     * Handle the blog nav video "created" event.
     *
     * @param  \App\Models\BlogNavVideo  $blogNavVideo
     * @return void
     */
    public function created(BlogNavVideo $blogNavVideo)
    {
        //
    }

    /**
     * Handle the blog nav video "updated" event.
     *
     * @param  \App\Models\BlogNavVideo  $blogNavVideo
     * @return void
     */
    public function updated(BlogNavVideo $blogNavVideo)
    {
        //
    }

    /**
     * Handle the blog nav video "deleted" event.
     *
     * @param  \App\Models\BlogNavVideo  $blogNavVideo
     * @return void
     */
    public function deleted(BlogNavVideo $blogNavVideo)
    {
        $video_img = $blogNavVideo->getOriginal('video_img');
        if($video_img){
            Storage::disk('admin')->delete($video_img);
        }
        $video_link = $blogNavVideo->getOriginal('video_link');
        if($video_link){
            $video_link = str_replace('_','/',$video_link);
            Storage::disk('public')->delete($video_link);
        }
    }

    /**
     * Handle the blog nav video "restored" event.
     *
     * @param  \App\Models\BlogNavVideo  $blogNavVideo
     * @return void
     */
    public function restored(BlogNavVideo $blogNavVideo)
    {
        //
    }

    /**
     * Handle the blog nav video "force deleted" event.
     *
     * @param  \App\Models\BlogNavVideo  $blogNavVideo
     * @return void
     */
    public function forceDeleted(BlogNavVideo $blogNavVideo)
    {
        //
    }
}
