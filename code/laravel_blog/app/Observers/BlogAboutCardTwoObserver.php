<?php

namespace App\Observers;

use App\Models\BlogAboutCardTwo;
use Illuminate\Support\Facades\Storage;

class BlogAboutCardTwoObserver
{
    /**
     * Handle the blog about card two "created" event.
     *
     * @param  \App\Models\BlogAboutCardTwo  $blogAboutCardTwo
     * @return void
     */
    public function created(BlogAboutCardTwo $blogAboutCardTwo)
    {
        //
    }

    /**
     * Handle the blog about card two "updated" event.
     *
     * @param  \App\Models\BlogAboutCardTwo  $blogAboutCardTwo
     * @return void
     */
    public function updated(BlogAboutCardTwo $blogAboutCardTwo)
    {
        //
    }

    /**
     * Handle the blog about card two "deleted" event.
     *
     * @param  \App\Models\BlogAboutCardTwo  $blogAboutCardTwo
     * @return void
     */
    public function deleted(BlogAboutCardTwo $blogAboutCardTwo)
    {
        $card_background = $blogAboutCardTwo->getOriginal('card_background');
        if($card_background){
            Storage::disk('admin')->delete($card_background);
        }
    }

    /**
     * Handle the blog about card two "restored" event.
     *
     * @param  \App\Models\BlogAboutCardTwo  $blogAboutCardTwo
     * @return void
     */
    public function restored(BlogAboutCardTwo $blogAboutCardTwo)
    {
        //
    }

    /**
     * Handle the blog about card two "force deleted" event.
     *
     * @param  \App\Models\BlogAboutCardTwo  $blogAboutCardTwo
     * @return void
     */
    public function forceDeleted(BlogAboutCardTwo $blogAboutCardTwo)
    {
        //
    }
}
