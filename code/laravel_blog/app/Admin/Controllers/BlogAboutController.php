<?php

namespace App\Admin\Controllers;

use App\Models\BlogAbout;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BlogAboutController extends AdminController
{
    protected $options = [
        1 => '单页',
        2 => '卡片介绍',
        3 => '卡片图标',
    ];

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogAbout';

    public function index(Content $content)
    {
        return $content->header('关于管理')->description('关于列表')->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BlogAbout);

        $grid->column('id', __('ID'));
        $grid->model()->orderBy('about_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('about_title', __('关于标题'))->editable();
        $grid->column('about_type', __('关于类型'))->using($this->options);
        $grid->column('about_sort', __('关于排序'));
        $grid->column('about_show', __('是否显示'))->using([1 => '显示', 2 => '隐藏']);
        $grid->column('created_at', __('添加时间'));

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
        $show = new Show(BlogAbout::findOrFail($id));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogAbout);

        $form->text('about_title', __('关于标题'))->attribute('autocomplete', 'off')->required()->rules('required|max:20');

        $form->select('about_type', __('关于类型'))->options($this->options)->required(0)->rules('required');
        $form->number('about_sort', __('关于排序'))->default(100)->rules('integer|between:0,999999');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('about_show', __('是否显示'))->states($states)->default(1);
        $form->textarea('about_describe', '关于描述');

        return $form;
    }
}
