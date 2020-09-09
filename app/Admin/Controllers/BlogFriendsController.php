<?php

namespace App\Admin\Controllers;

use App\Models\BlogFriends;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class BlogFriendsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogFriends';

    public function index(Content $content)
    {
        return $content->header('友链管理')->description('链接列表')->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BlogFriends);
        $grid->model()->orderBy('friends_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('id', 'ID');
        $grid->column('friends_title', '博客名称')->editable();
        $grid->column('friends_link', '博客链接')->link();
        $grid->column('friends_describe', '博客描述');
        $grid->column('friends_contact', '联系方式');
        $grid->column('friends_show', '是否显示')->using([1 => '显示', 2 => '隐藏']);
        $grid->column('friends_type', '添加方式')->using([1 => '申请添加', 2 => '后台添加']);
        $grid->column('friends_examine', '审核状态')->using([1 => '通过', 2 => '待审核', 3 => '未通过']);
        $grid->column('friends_recommend', '是否推荐')->using([1 => '推荐', 2 => '正常']);
        $grid->column('friends_sort', '友链排序');
        $grid->column('created_at', '添加时间');
        $grid->filter(function ($filter) {
            $filter->like('friends_title', '博客名称');
            $filter->like('friends_link', '博客链接');
            $filter->equal('friends_show', '是否显示')->select([1 => '显示', 2 => '隐藏']);
            $filter->equal('friends_show', '是否推荐')->select([1 => '推荐', 2 => '正常']);
            $filter->equal('friends_examine', '审核状态')->select([1 => '通过', 2 => '待审核', 3 => '未通过']);
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
        $show = new Show(BlogFriends::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogFriends);

        $form->text('friends_title', '博客名称')->attribute('autocomplete', 'off')->required()->rules('required|max:40');
        $form->url('friends_link', '博客链接')->attribute('autocomplete', 'off')->required()->rules('required|url')->creationRules(['required' => 'unique:blog_friends']);
        $form->textarea('friends_describe', '博客描述')->attribute('autocomplete', 'off')->required()->rules('required|max:100');
        $form->text('friends_contact', '联系方式')->attribute('autocomplete', 'off')->required()->rules('required');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('friends_show', '是否显示')->states($states)->default(1);
        $form->hidden('friends_type', '添加方式')->value(2);
        $form->number('friends_sort', '排序')->default(100);
        $status = [1 => '通过', 2 => '待审核', 3 => '未通过'];
        $form->radio('friends_examine', '审核状态')->options($status)->default(2);
        $recommend = [
            'on'  => ['value' => 1, 'text' => '推荐', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '正常', 'color' => 'danger'],
        ];
        $form->switch('friends_recommend', '是否推荐')->states($recommend)->default(2);
        return $form;
    }
}
