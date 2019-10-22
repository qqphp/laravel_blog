<?php

namespace App\Admin\Controllers;

use App\Models\BlogMessage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BlogMessageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogMessage';

    public function index(Content $content)
    {
        return $content->header('留言管理')->description('留言列表')->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BlogMessage);
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', 'ID');
        $grid->column('msg_blog_name', '博客名称');
        $grid->column('msg_blog_link', '博客链接')->link();
        $grid->column('msg_blog_contact', '联系方式');
        $grid->column('msg_show', '是否显示')->using([1 => '显示', 2 => '隐藏']);
        $grid->column('msg_type', '留言板块')->using([1 => '文章板块', 2 => '视频板块', 3 => '留言板块']);;
        $grid->column('msg_ip', '留言人IP');
        $grid->column('created_at', '添加时间');
        $grid->filter(function ($filter) {
            $filter->like('msg_blog_name', '博客名称');
            $filter->like('msg_blog_link', '博客链接');
            $filter->equal('msg_show', '是否显示')->select([1 => '显示', 2 => '隐藏']);
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
        $show = new Show(BlogMessage::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogMessage);
        $form->text('msg_blog_name', '留言博客名称')->attribute('autocomplete', 'off')->required()->rules('required|max:40');
        $form->text('msg_blog_link', '留言博客链接')->attribute('autocomplete', 'off')->required()->rules('required|url');
        $form->text('msg_blog_contact', '留言联系方式')->attribute('autocomplete', 'off')->required()->rules('required');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('msg_show', '是否显示')->states($states)->default(1);
        $form->textarea('msg_content', '留言内容')->required()->rules('required');
        $form->hidden('msg_type', '留言类型')->default(3);
        return $form;
    }
}
