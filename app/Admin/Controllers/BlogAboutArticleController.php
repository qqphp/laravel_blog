<?php

namespace App\Admin\Controllers;

use App\Models\BlogAboutArticle;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BlogAboutArticleController extends AdminController
{

    protected $about_type = [];

    public function __construct()
    {
        $this->about_type = DB::table('blog_about')->where('about_type', 1)->pluck('about_title', 'id');
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogAboutArticle';

    public function index(Content $content)
    {
        return $content->header('关于管理')->description('单页管理')->body($this->grid($this->about_type));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($about_type)
    {
        $grid = new Grid(new BlogAboutArticle);
        $grid->model()->orderBy('article_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('id', __('ID'));
        $grid->column('articles_title', __('单页标题'))->editable();
        $grid->column('article_show', __('是否显示'))->using([1 => '显示', 2 => '隐藏']);
        $grid->column('article_sort', __('单页排序'));
        $grid->column('notice_id', __('所属关于'))->using($about_type->toArray());
        $grid->column('created_at', __('创建时间'));
        $grid->filter(function ($filter) use ($about_type) {
            $filter->equal('notice_id', '所属关于')->select($about_type);
            $filter->like('articles_title', '单页标题');
            $filter->equal('article_show', '是否显示')->select([1 => '显示', 2 => '隐藏']);
        });
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
        $show = new Show(BlogAboutArticle::findOrFail($id));

        $show->field('id', __('Id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogAboutArticle);

        $form->select('notice_id', __('关联列表'))->options($this->about_type)->required()->rules('required');
        $form->text('articles_title', __('单页标题'))->attribute('autocomplete', 'off')->required()->rules('required|max:20');
        $form->simditor('articles_content', __('单页内容'));
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('article_show', '是否显示')->states($states)->default(1);
        $form->number('article_sort', __('单页排序'))->default(100)->rules('integer|between:0,999999');

        return $form;
    }
}
