<?php

namespace App\Observers;

use App\Jobs\SendReminderEmail;
use App\Models\BlogNavArticle;
use App\Models\BlogTag;
use App\Models\BlogSubscribe;

class BlogNavArticleObserver
{
    /**
     * Handle the blog nav article "created" event.
     *
     * @param  \App\Models\BlogNavArticle  $blogNavArticle
     * @return void
     */
    public function created(BlogNavArticle $blogNavArticle)
    {

        $a_id = $blogNavArticle->getAttributeValue('id');
        $article_tag = $blogNavArticle->getAttributeValue('article_tag');
        if(trim($article_tag)){
            $tag_array = explode(',',$article_tag);

            foreach ($tag_array as $item) {
                $tagModel = new BlogTag();
                $tagModel->tag_content = $item;
                $tagModel->tag_click = 0;
                $tagModel->a_id = $a_id;
                $tagModel->save();
            }
            $email_list = BlogSubscribe::where('is_pass',2)->pluck('email');
            foreach ($email_list as $k => $v){
                //调用队列
                SendReminderEmail::dispatch($blogNavArticle,$v);
            }
        }
    }

    /**
     * Handle the blog nav article "updated" event.
     *
     * @param  \App\Models\BlogNavArticle  $blogNavArticle
     * @return void
     */
    public function updated(BlogNavArticle $blogNavArticle)
    {
        $a_id = $blogNavArticle->getAttributeValue('id');
        $tagModel = new BlogTag();
        $tag_article = $tagModel::where('a_id','=',$a_id)->get();
        //现在的标签
        $origin_tag = $blogNavArticle->getAttributeValue('article_tag');
        $tag_new = empty($origin_tag) ? [] : explode(',',$origin_tag);
        $tag_old = array();
        foreach ($tag_article as $item) {
            //判断旧的标签是否在最新的标签中
            if(!in_array($item->tag_content,$tag_new)){
                BlogTag::destroy($item->id);
            };
            $tag_old[] = $item->tag_content;
        }
        $diff_tag = array_diff($tag_new,$tag_old);
        foreach ($diff_tag as $item) {
            $tagModel = new BlogTag();
            $tagModel->tag_content = $item;
            $tagModel->tag_click = 0;
            $tagModel->a_id = $a_id;
            $tagModel->save();
        }
    }

    /**
     * Handle the blog nav article "deleted" event.
     *
     * @param  \App\Models\BlogNavArticle  $blogNavArticle
     * @return void
     */
    public function deleted(BlogNavArticle $blogNavArticle)
    {
        $aid = $blogNavArticle->getOriginal('id');
        BlogTag::where('a_id',$aid)->delete();
    }

    /**
     * Handle the blog nav article "restored" event.
     *
     * @param  \App\Models\BlogNavArticle  $blogNavArticle
     * @return void
     */
    public function restored(BlogNavArticle $blogNavArticle)
    {
        //
    }

    /**
     * Handle the blog nav article "force deleted" event.
     *
     * @param  \App\Models\BlogNavArticle  $blogNavArticle
     * @return void
     */
    public function forceDeleted(BlogNavArticle $blogNavArticle)
    {
        //
    }
}
