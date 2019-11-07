<?php

namespace App\Http\Controllers\home;

use App\Http\Requests\StoreArticleMsgPost;
use App\Models\BlogMessage;
use App\Models\BlogNavArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleDetailController extends Controller
{
    /**
     * 文章详情
     */
    public function index(Request $request)
    {
        $a_id           = $request->route('aid');
        $articleModel   = new BlogNavArticle();
        $article_result = $articleModel::find($a_id);
        //获取上一篇文章
        $previousPostID = $articleModel::where('article_show', 1)->where('nav_id', $article_result->nav_id)->where('id', '<', $a_id)->where('article_show', 1)->where('nav_id', $article_result->nav_id)->max('id');
        $previousPostID = empty($previousPostID) ? $a_id : $previousPostID;
        //获取下一篇文章
        $nextPostID = $articleModel::where('article_show', 1)->where('nav_id', $article_result->nav_id)->where('id', '>', $a_id)->where('article_show', 1)->where('nav_id', $article_result->nav_id)->min('id');
        $nextPostID = empty($nextPostID) ? $a_id : $nextPostID;
        //获取本篇文章url
        $article_url = url()->current();
        //获取本篇文章所属留言
        $article_message = BlogMessage::where('foreign_id', $a_id)->orderBy('id', 'desc')->paginate(6);
        //获取留言的背景色
        $bg_arr = define_background();
        //获取徽章颜色
        $badge_arr = define_badge_color();
        //点击量自增
        $articleModel::where('id', $a_id)->increment('article_click');

        return view('home.article_details.index', compact('article_result', 'article_url', 'badge_arr', 'previousPostID', 'nextPostID', 'article_message', 'bg_arr'));
    }

    /**
     * 文章留言
     */
    public function article_msg(StoreArticleMsgPost $request)
    {
        $msg_content                 = $request->msg_content;
        $msg_blog_name               = $request->msg_blog_name;
        $msg_blog_link               = $request->msg_blog_link;
        $msg_blog_contact            = $request->msg_blog_contact;
        $msg_type                    = $request->msg_type;
        $foreign_id                  = $request->foreign_id;
        $msgIp = BlogMessage::where('msg_ip', $request->getClientIp())->whereBetween('created_at',[date('Y-m-d'),date('Y-m-d 23:59:59')])->count();
        if($msgIp > 6){
            $result = array(
                'status' => 0,
                'msg'    => '由于经常遇到恶意留言，特此每个ip限制每日留言数量为6条，十分抱歉。'
            );
            return response()->json($result);
        }

        $blogModel                   = new BlogMessage();
        $blogModel->msg_content      = $msg_content;
        $blogModel->msg_blog_name    = $msg_blog_name;
        $blogModel->msg_blog_link    = $msg_blog_link;
        $blogModel->msg_blog_contact = $msg_blog_contact;
        $blogModel->msg_ip           = $request->getClientIp();
        $blogModel->msg_show         = 1;
        $blogModel->msg_type         = $msg_type;
        $blogModel->foreign_id       = $foreign_id;
        $blogModel->save();
        //获取留言的背景色
        $bg_arr = define_background();
        if ($msg_type == 3) {
            $mas_div = '<div class="card" data-background="color" data-color="' . $bg_arr[rand(0, 5)] . '"><div class="card-body"><div class="author"><a href="' . $msg_blog_link . '" target="_blank"><img src="' . asset(__STATIC_HOME__) . '/assets/img/qqhead.png" alt="..." class="avatar img-raised"><span>' . $msg_blog_name . '</span></a></div><span class="category-social pull-right"><i class="fa fa-quote-right"></i></span><div class="clearfix"></div><p class="card-description">“' . $msg_content . '”</p></div></div>';
        } else {
            $mas_div = '<div class="col-sm-12 ml-auto"><div class="card" data-background="color" data-color="' . $bg_arr[rand(0, 5)] . '"><div class="card-body"><div class="author"><a href="' . $msg_blog_link . '" target="_blank"><img src="' . asset(__STATIC_HOME__) . '/assets/img/qqhead.png" alt="..." class="avatar img-raised"><span>' . $msg_blog_name . '</span></a></div><span class="category-social pull-right"><i class="fa fa-quote-right"></i></span><div class="clearfix"></div><p class="card-description">“' . $msg_content . '”</p></div></div></div>';
        }
        $result = array(
            'status' => 1,
            'msg'    => '留言成功',
            'result' => $mas_div
        );
        return response()->json($result);
    }

}
