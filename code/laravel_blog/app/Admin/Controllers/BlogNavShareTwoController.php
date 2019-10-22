<?php

namespace App\Admin\Controllers;

use App\Models\BlogNavShareTwo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BlogNavShareTwoController extends AdminController
{
    protected $nav_name = [];

    public function __construct()
    {
        $this->nav_name = DB::table('blog_nav')->where('nav_type', 6)->pluck('nav_title', 'id')->toArray();
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogNavShareTwo';

    public function index(Content $content)
    {
        return $content->header('内容管理')->description('分享卡片一管理')->body($this->grid($this->nav_name));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($nav_name)
    {
        $grid = new Grid(new BlogNavShareTwo);
        $grid->model()->orderBy('share_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('id', 'ID');
        $grid->column('nav_id', '所属导航')->display(function ($nav_id) use ($nav_name) {
            return $nav_name[$nav_id];
        });
        $grid->column('share_title', '分享标题')->editable();
        $grid->column('share_note', '分享副标题')->editable();
        $grid->column('share_src', '分享封面')->image();
        $grid->column('share_link', '分享链接')->link();
        $grid->column('share_sort', '分享排序');
        $grid->column('share_show', '是否显示')->using([1 => '显示', 2 => '隐藏']);
        $grid->filter(function ($filter) use ($nav_name) {
            $filter->equal('nav_id', '所属导航')->select($nav_name);
            $filter->like('share_title', '文章标题');
            $filter->equal('share_show', '是否隐藏')->select([1 => '显示', 2 => '隐藏']);
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
        $show = new Show(BlogNavShareTwo::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogNavShareTwo);
        $form->select('nav_id', '所属导航')->options($this->nav_name)->rules('required|integer');
        $form->text('share_title', '分享标题')->attribute('autocomplete', 'off')->required()->rules('required|max:40');
        $form->text('share_note', '分享副标题')->attribute('autocomplete', 'off')->required()->rules('required|max:40');
        $form->text('share_link', '分享链接')->rules('url');
        $form->image('share_src', '分享封面')->uniqueName()->attribute('accept', 'image/*')->required();
        $form->number('share_sort', '分享排序')->default(100)->rules('integer|between:0,999999');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('share_show', '是否显示')->states($states)->default(1);
        $form->textarea('share_describe', '分享描述');


        return $form;
    }
}
