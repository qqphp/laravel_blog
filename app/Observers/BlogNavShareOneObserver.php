<?php

namespace App\Observers;

use App\Models\BlogNavShareOne;
use Illuminate\Support\Facades\Storage;

class BlogNavShareOneObserver
{
    /**
     * Handle the blog nav share one "created" event.
     *
     * @param  \App\Models\BlogNavShareOne  $blogNavShareOne
     * @return void
     */
    public function created(BlogNavShareOne $blogNavShareOne)
    {
        //
    }

    /**
     * Handle the blog nav share one "updated" event.
     *
     * @param  \App\Models\BlogNavShareOne  $blogNavShareOne
     * @return void
     */
    public function updated(BlogNavShareOne $blogNavShareOne)
    {
        //
    }

    /**
     * Handle the blog nav share one "deleted" event.
     *
     * @param  \App\Models\BlogNavShareOne  $blogNavShareOne
     * @return void
     */
    public function deleted(BlogNavShareOne $blogNavShareOne)
    {
        $share_src = $blogNavShareOne->getOriginal('share_src');
        if($share_src){
            Storage::disk('admin')->delete($share_src);
        }
    }

    /**
     * Handle the blog nav share one "restored" event.
     *
     * @param  \App\Models\BlogNavShareOne  $blogNavShareOne
     * @return void
     */
    public function restored(BlogNavShareOne $blogNavShareOne)
    {
        //
    }

    /**
     * Handle the blog nav share one "force deleted" event.
     *
     * @param  \App\Models\BlogNavShareOne  $blogNavShareOne
     * @return void
     */
    public function forceDeleted(BlogNavShareOne $blogNavShareOne)
    {
        //
    }
}
