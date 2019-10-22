<?php

namespace App\Observers;

use App\Models\BlogFriends;
use Illuminate\Support\Facades\Storage;

class BlogFriendsObserver
{
    /**
     * Handle the blog friends "created" event.
     *
     * @param  \App\Models\BlogFriends  $blogFriends
     * @return void
     */
    public function created(BlogFriends $blogFriends)
    {
        //
    }

    /**
     * Handle the blog friends "updated" event.
     *
     * @param  \App\Models\BlogFriends  $blogFriends
     * @return void
     */
    public function updated(BlogFriends $blogFriends)
    {
        //
    }

    /**
     * Handle the blog friends "deleted" event.
     *
     * @param  \App\Models\BlogFriends  $blogFriends
     * @return void
     */
    public function deleted(BlogFriends $blogFriends)
    {

    }

    /**
     * Handle the blog friends "restored" event.
     *
     * @param  \App\Models\BlogFriends  $blogFriends
     * @return void
     */
    public function restored(BlogFriends $blogFriends)
    {
        //
    }

    /**
     * Handle the blog friends "force deleted" event.
     *
     * @param  \App\Models\BlogFriends  $blogFriends
     * @return void
     */
    public function forceDeleted(BlogFriends $blogFriends)
    {
        //
    }
}
