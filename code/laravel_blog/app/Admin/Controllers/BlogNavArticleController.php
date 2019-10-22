<?php

namespace App\Admin\Controllers;

use App\Models\BlogNavArticle;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BlogNavArticleController extends AdminController
{
    protected $nav_name = [];

    public function __construct()
    {
        $this->nav_name = DB::table('blog_nav')->where('nav_type', 1)->pluck('nav_title', 'id')->toArray();
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogNavArticle';

    public function index(Content $content)
    {
        return $content->header('内容管理')->description('文章管理')->body($this->grid($this->nav_name));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($nav_name)
    {
        $grid = new Grid(new BlogNavArticle);
        $grid->model()->orderBy('article_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('nav_id', '所属导航')->display(function ($nav_id) use ($nav_name) {
            return $nav_name[$nav_id];
        });
        $grid->column('article_title', '文章标题')->editable();
        $grid->column('article_tag', '文章标签')->display(function ($article_tag) {
            $article_tag = empty($article_tag) ? '' : explode(',', $article_tag);
            return $article_tag;
        })->label('success');
        $grid->column('article_click', '点击量');
        $grid->column('article_show', '是否显示')->using([1 => '显示', 2 => '隐藏']);
        $grid->column('article_sort', '文章排序');
        $grid->filter(function ($filter) use ($nav_name) {
            $filter->equal('nav_id', '所属导航')->select($nav_name);
            $filter->like('article_title', '文章标题');
            $filter->equal('article_show', '是否隐藏')->select([1 => '显示', 2 => '隐藏']);
        });
        $grid->column('created_at', '添加时间');
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(BlogNavArticle::findOrFail($id));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogNavArticle);

        $form->select('nav_id', '所属导航')->options($this->nav_name)->rules('required|integer');
        $form->text('article_title', '文章标题')->attribute('autocomplete', 'off')->required()->rules('required|max:40');
        $form->tags('article_tag', '文章标签')->help('建议使用标签总数量不超过6个')->attribute('autocomplete', 'off');
        $form->textarea('article_describe', '文章简介');
        $form->editormd('article_content', '文章内容')->required()->rules('required');
        $form->number('article_click', '点击量')->default(0)->rules('integer|between:0,999999');
        $form->number('article_sort', '文章排序')->default(100)->rules('integer|between:0,999999');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('article_show', '是否显示')->states($states)->default(1);
        return $form;
    }

}
