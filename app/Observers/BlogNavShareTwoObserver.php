<?php

namespace App\Observers;

use App\Models\BlogNavShareTwo;
use Illuminate\Support\Facades\Storage;

class BlogNavShareTwoObserver
{
    /**
     * Handle the blog nav share two "created" event.
     *
     * @param  \App\Models\BlogNavShareTwo  $blogNavShareTwo
     * @return void
     */
    public function created(BlogNavShareTwo $blogNavShareTwo)
    {
        //
    }

    /**
     * Handle the blog nav share two "updated" event.
     *
     * @param  \App\Models\BlogNavShareTwo  $blogNavShareTwo
     * @return void
     */
    public function updated(BlogNavShareTwo $blogNavShareTwo)
    {
        //
    }

    /**
     * Handle the blog nav share two "deleted" event.
     *
     * @param  \App\Models\BlogNavShareTwo  $blogNavShareTwo
     * @return void
     */
    public function deleted(BlogNavShareTwo $blogNavShareTwo)
    {
        $share_src = $blogNavShareTwo->getOriginal('share_src');
        if($share_src){
            Storage::disk('admin')->delete($share_src);
        }
    }

    /**
     * Handle the blog nav share two "restored" event.
     *
     * @param  \App\Models\BlogNavShareTwo  $blogNavShareTwo
     * @return void
     */
    public function restored(BlogNavShareTwo $blogNavShareTwo)
    {
        //
    }

    /**
     * Handle the blog nav share two "force deleted" event.
     *
     * @param  \App\Models\BlogNavShareTwo  $blogNavShareTwo
     * @return void
     */
    public function forceDeleted(BlogNavShareTwo $blogNavShareTwo)
    {
        //
    }
}
