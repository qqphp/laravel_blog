<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\GoArticle;
use App\Models\BlogNav;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;

class BlogNavController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogNav';
    protected $navigation = [
        0 => '顶级分类',
        1 => '文章',
        2 => '照片',
        3 => '音乐',
        4 => '视频',
        5 => '卡片1',
        6 => '卡片2',
    ];

    public function index(Content $content)
    {
        $content->header('导航管理');
        $content->description('导航列表');
        return $content->row(function (Row $row) {
            $row->column(6, BlogNav::tree(function ($tree) {
                $tree->disableCreate();
                $tree->branch(function ($branch) {
                    if ($branch['nav_open'] == 1) {
                        $lable = '<span class="label label-info" style="margin-left: 20px;">启用</span>';
                    } else {
                        $lable = '<span class="label label-default" style="margin-left: 20px;">关闭</span>';
                    }
                    return "{$branch['id']} - {$branch['nav_title']}" . $lable;
                });
            }));
            $row->column(6, function (Column $column) {
                $form = new Form(new BlogNav);
                $form->setAction('blog-navs');
                $tree_nav   = $form->model()->getTree();
                $select_nav = array('顶级导航');
                foreach ($tree_nav as $k => $v) {
                    $select_nav[$v['id']] = str_repeat('|--------', $v['level']) . $v['nav_title'];
                }
                $form->select('nav_pid', '顶级导航')->options($select_nav)->default(0);
                $form->text('nav_title', '导航标题')->rules('required|max:20');

                $form->select('nav_type', '导航分类')->options($this->navigation);
                $states = [
                    'on'  => ['value' => 1, 'text' => '启用', 'color' => 'info'],
                    'off' => ['value' => 2, 'text' => '关闭', 'color' => 'danger'],
                ];
                $form->switch('nav_open', '是否启用')->states($states)->default(1);
                $form->number('nav_sort', '导航排序')->default(100)->rules('integer|between:1,999999');
                $column->append($form);
            });
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BlogNav);
        $grid->model()->orderBy('nav_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('id', 'ID');
        $grid->column('nav_title', '导航标题')->editable();
        $grid->column('nav_type', '导航类型')->using($this->navigation);
        $grid->column('nav_open', '是否启用')->using([1 => '启用', 2 => '关闭'])->label([
            2 => 'default',
            1 => 'success',
        ]);
        $grid->column('nav_sort', '导航排序')->editable();
        $grid->column('nav_pid', '上级导航')->display(function ($nav_pid) {
            $blog_model = new BlogNav();
            $tree_nav   = $blog_model->getTree();

            $select_nav = array('顶级导航');
            foreach ($tree_nav as $k => $v) {
                $select_nav[$v['id']] = $v['nav_title'];
            }
            return empty($select_nav[$nav_pid]) ? '暂无' : $select_nav[$nav_pid];
        });
        $grid->column('created_at', '创建时间');

        $grid->filter(function ($filter) {
            $filter->like('nav_title', '导航标题');
        });
        $grid->actions(function ($actions) {
            $actions->add(new GoArticle());
            $actions->disableView();
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
        $show = new Show(BlogNav::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogNav);
        $form->display('id', 'ID');
        $tree_nav   = $form->model()->getTree();
        $select_nav = array('顶级导航');
        foreach ($tree_nav as $k => $v) {
            $select_nav[$v['id']] = str_repeat('|----', $v['level']) . $v['nav_title'];
        }
        $form->select('nav_pid', '顶级导航')->options($select_nav)->default(0);
        $form->text('nav_title', '导航标题')->attribute('autocomplete', 'off')->rules('required|max:40');

        $form->select('nav_type', '导航分类')->options($this->navigation);
        $states = [
            'on'  => ['value' => 1, 'text' => '启用', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '关闭', 'color' => 'danger'],
        ];
        $form->switch('nav_open', '是否启用')->states($states)->default(1);
        $form->number('nav_sort', '导航排序')->default(100)->rules('integer|between:1,999999');

        //保存后回调
        $form->saved(function (Form $form) {
            $blog_nav            = new BlogNav();
            $id                  = $form->model()->id;
            $blog_nav            = $blog_nav::find($id);
            $route_home          = [
                '0' => '',
                '1' => 'article',
                '2' => 'photo',
                '3' => 'music',
                '4' => 'video',
                '5' => 'card1',
                '6' => 'card2',
            ];
            $blog_nav->nav_route = $route_home[$form->nav_type];
            $blog_nav->save();
        });

        return $form;
    }

}
