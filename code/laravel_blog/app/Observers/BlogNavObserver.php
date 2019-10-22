<?php

namespace App\Observers;

use App\Models\BlogNav;
use App\Models\BlogNavArticle;
use App\Models\BlogNavMusic;
use App\Models\BlogNavPhoto;
use App\Models\BlogNavShareOne;
use App\Models\BlogNavShareTwo;
use App\Models\BlogNavVideo;

class BlogNavObserver
{
    /**
     * Handle the blog nav "created" event.
     *
     * @param  \App\Models\BlogNav $blogNav
     * @return void
     */
    public function created(BlogNav $blogNav)
    {
        //
    }

    /**
     * Handle the blog nav "updated" event.
     *
     * @param  \App\Models\BlogNav $blogNav
     * @return void
     */
    public function updated(BlogNav $blogNav)
    {
        //
    }

    /**
     * Handle the blog nav "deleted" event.
     *
     * @param  \App\Models\BlogNav $blogNav
     * @return void
     */
    public function deleted(BlogNav $blogNav)
    {
        $nav_id = $blogNav->getOriginal('id');
        //删除下级导航
        $data_nav = BlogNav::where('nav_pid', $nav_id)->get();
        foreach ($data_nav as $k => $v){
            BlogNav::destroy($v->id);
        }
        //删除所属文章、视频、相册、分享等
        $data_article = BlogNavArticle::where('nav_id', $nav_id)->get();
        foreach ($data_article as $k =>$v) {
            BlogNavArticle::destroy($v->id);
        }
        $data_music = BlogNavMusic::where('nav_id', $nav_id)->get();
        foreach ($data_music as $k =>$v) {
            BlogNavMusic::destroy($v->id);
        }
        $data_video = BlogNavVideo::where('nav_id', $nav_id)->get();
        foreach ($data_video as $k =>$v) {
            BlogNavVideo::destroy($v->id);
        }
        $data_photo = BlogNavPhoto::where('nav_id', $nav_id)->get();
        foreach ($data_photo as $k =>$v) {
            BlogNavPhoto::destroy($v->id);
        }
        $data_one = BlogNavShareOne::where('nav_id', $nav_id)->get();
        foreach ($data_one as $k =>$v) {
            BlogNavShareOne::destroy($v->id);
        }
        $data_two = BlogNavShareTwo::where('nav_id', $nav_id)->get();
        foreach ($data_two as $k =>$v) {
            BlogNavShareTwo::destroy($v->id);
        }
    }

    /**
     * Handle the blog nav "restored" event.
     *
     * @param  \App\Models\BlogNav $blogNav
     * @return void
     */
    public function restored(BlogNav $blogNav)
    {
        //
    }

    /**
     * Handle the blog nav "force deleted" event.
     *
     * @param  \App\Models\BlogNav $blogNav
     * @return void
     */
    public function forceDeleted(BlogNav $blogNav)
    {
        //
    }
}
