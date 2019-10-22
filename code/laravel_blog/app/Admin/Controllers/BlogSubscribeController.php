<?php

namespace App\Admin\Controllers;

use App\Models\BlogSubscribe;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BlogSubscribeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogSubscribe';

    public function index(Content $content)
    {
        return $content->header('订阅管理')->description('订阅列表')->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BlogSubscribe);
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('ID'));
        $grid->column('email', __('邮箱名称'));
        $grid->column('ip', __('ip地址'));
        $grid->column('is_pass', __('审核状态'))->using([1 => '审核中', 2 => '审核通过', 3 => '冻结封禁']);
        $grid->column('add_mode', __('添加方式'))->using([1 => '申请添加', 2 => '后台添加']);
        $grid->column('created_at', __('添加时间'));
        $grid->filter(function ($filter) {
            $filter->like('email', '邮箱名称');
            $filter->equal('is_pass', '审核状态')->select([1 => '审核中', 2 => '审核通过', 3 => '冻结封禁']);
            $filter->equal('add_mode', '添加方式')->select([1 => '申请添加', 2 => '后台添加']);
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
        $show = new Show(BlogSubscribe::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogSubscribe);
        $form->email('email', __('邮箱名称'))->creationRules('required|unique:blog_subscribes,email');
        $pass_status = [1 => '审核中', 2 => '审核通过', 3 => '冻结封禁'];
        $form->radio('is_pass', __('审核状态'))->options($pass_status)->default(1);
        $form->hidden('add_mode')->default(2);
        return $form;
    }
}
