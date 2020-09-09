<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\StoreBlogSubscribePost;
use App\Models\BlogMessage;
use App\Models\BlogSubscribe;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogNavArticle;
use App\Models\BlogNotice;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $random_article = [];
        $show_article   = [];

        $nav_id       = $request->route('nav_id');
        $search_title = $request->input('search_title');
        $tag_content  = $request->input('tag_content');

        $article_model = new BlogNavArticle();
        $tagModel      = new BlogTag();

        $where_all_article = array(
            ['article_show', '=', 1]
        );
        if (trim($nav_id)) {
            $where_all_article[] = ['nav_id', '=', $nav_id];
        }
        if (trim($search_title)) {
            $where_all_article[] = ['article_title', 'like', '%' . $search_title . '%'];
        }
        $where_tag = array();
        if ($tag_content) {
            //点击标签时，该标签自增1
            $tag_aid = $tagModel::where('tag_content', '=', $tag_content)->pluck('a_id', 'id');
            if ($tag_aid->count()) {
                $where_tag = function ($query) use ($tag_aid) {
                    $query->whereIn('id', $tag_aid->toArray());
                };
                //这里自增标签点击量
                $tag_id = $tag_aid->keys();
                $tagModel::whereIn('id', $tag_id)->increment('tag_click');
            }
        }
        //获取所有文章
        $show_article = $article_model::where($where_all_article)->where($where_tag)->orderBy('article_sort', 'desc')->orderBy('id', 'desc')->paginate(6);

        //判断是否传入所属导航id
        if ($nav_id) {
            //获取随机4条文章
            $random_article = $article_model::where('article_show', 1)->where('nav_id', $nav_id)->whereRaw("id >= (select floor(rand() * (select max(id) from `blog_nav_article`)))")->take(4)->get();
            //获取热门文章
            $hot_article = $article_model::where('article_show', 1)->where('nav_id', $nav_id)->orderBy('article_click', 'desc')->take(6)->get();
        } else {
            //获取随机4条文章
            $random_article = $article_model::where('article_show', 1)->whereRaw("id >= (select floor(rand() * (select max(id) from `blog_nav_article`)))")->take(4)->get();
            //获取热门文章
            $hot_article = $article_model::where('article_show', 1)->orderBy('article_click', 'desc')->take(6)->get();
        }

        //获取最新的公告2条
        $notice_model = new BlogNotice();
        $notice_list  = $notice_model::where('notice_show', 1)->orderBy('notice_sort', 'desc')->orderBy('id', 'desc')->take(2)->get();
        //背景颜色
        $background_color = array('blue', 'green', 'yellow', 'brown', 'purple', 'orange');
        shuffle($background_color);
        //按钮颜色
        $button_color = array('btn-primary', 'btn-info', 'btn-success', 'btn-danger', 'btn-warning', 'btn-default');
        shuffle($button_color);
        //星期数组
        $week_list = array('星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六');

        //统计多少次阅读
        $article_click = $article_model::where($where_all_article)->where($where_tag)->sum('article_click');
        //统计留言条数
        $message_model = new BlogMessage();
        $total_msg     = $message_model->count();
        //标签云
        $tag_result = $tagModel::select(DB::raw('count(a_id) as article_count, FLOOR(0 + (RAND() * 6)) as tag_color,tag_content,sum(tag_click) as sum_click'))->groupBy('tag_content')->orderBy('sum_click', 'desc')->take(40)->get();
        $tag_color  = define_badge_color();
        return view('home.article.index', compact('random_article', 'show_article', 'background_color', 'hot_article', 'button_color', 'notice_list', 'week_list', 'search_title', 'tag_result', 'tag_color', 'article_click', 'total_msg'));
    }

    /**
     * 订阅我
     */
    public function subscribe(StoreBlogSubscribePost $request)
    {
        $email_name          = $request->input('email_name');
        $blogModel           = new BlogSubscribe();
        $blogModel->email    = $email_name;
        $blogModel->ip       = $request->getClientIp();
        $blogModel->is_pass  = 1;
        $blogModel->add_mode = 1;
        $blogModel->save();

        $result = array(
            'status' => 1,
            'msg'    => '订阅成功',
            'result' => []
        );
        return response()->json($result);
    }
}
