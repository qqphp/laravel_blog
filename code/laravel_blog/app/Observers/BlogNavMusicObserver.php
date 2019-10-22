<?php

namespace App\Observers;

use App\Models\BlogNavMusic;
use Illuminate\Support\Facades\Storage;

class BlogNavMusicObserver
{
    /**
     * Handle the blog nav music "created" event.
     *
     * @param  \App\Models\BlogNavMusic  $blogNavMusic
     * @return void
     */
    public function created(BlogNavMusic $blogNavMusic)
    {
        //
    }

    /**
     * Handle the blog nav music "updated" event.
     *
     * @param  \App\Models\BlogNavMusic  $blogNavMusic
     * @return void
     */
    public function updated(BlogNavMusic $blogNavMusic)
    {
        //
    }

    /**
     * Handle the blog nav music "deleted" event.
     *
     * @param  \App\Models\BlogNavMusic  $blogNavMusic
     * @return void
     */
    public function deleted(BlogNavMusic $blogNavMusic)
    {
        $music_img = $blogNavMusic->getOriginal('music_img');
        //删除封面图
        if($music_img){
            Storage::disk('admin')->delete($music_img);
        }
        //删除所属文件
        $music_json = $blogNavMusic->music_json;
        if($music_json){
            Storage::disk('admin')->delete($music_json);
        }
    }

    /**
     * Handle the blog nav music "restored" event.
     *
     * @param  \App\Models\BlogNavMusic  $blogNavMusic
     * @return void
     */
    public function restored(BlogNavMusic $blogNavMusic)
    {
        //
    }

    /**
     * Handle the blog nav music "force deleted" event.
     *
     * @param  \App\Models\BlogNavMusic  $blogNavMusic
     * @return void
     */
    public function forceDeleted(BlogNavMusic $blogNavMusic)
    {
        //
    }
}
