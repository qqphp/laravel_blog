<?php

namespace App\Admin\Controllers;

use App\Models\BlogAboutCardOne;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BlogAboutCardOneController extends AdminController
{

    protected $about_type = [];

    public function __construct()
    {
        $this->about_type = DB::table('blog_about')->where('about_type', 2)->pluck('about_title', 'id');
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogAboutCardOne';

    public function index(Content $content)
    {
        return $content->header('关于管理')->description('卡片管理')->body($this->grid($this->about_type));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($about_type)
    {
        $grid = new Grid(new BlogAboutCardOne);

        $grid->column('id', __('ID'));
        $grid->model()->orderBy('card_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('card_title', __('卡片标题'));
        $grid->column('card_icon', __('卡片icon'));
        $grid->column('card_show', __('是否显示'))->using([1 => '显示', 2 => '隐藏']);
        $grid->column('card_sort', __('卡片排序'));
        $grid->column('notice_id', __('所属关于'))->using($about_type->toArray());
        $grid->column('created_at', __('添加时间'));
        $grid->filter(function ($filter) use ($about_type) {
            $filter->equal('notice_id', '所属关于')->select($about_type);
            $filter->like('card_title', '卡片标题');
            $filter->equal('card_show', '是否显示')->select([1 => '显示', 2 => '隐藏']);
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
        $show = new Show(BlogAboutCardOne::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogAboutCardOne);
        $form->select('notice_id', __('关联列表'))->options($this->about_type)->required();
        $form->text('card_title', __('卡片标题'))->attribute('autocomplete', 'off')->required()->rules('required|max:20');
        $form->icon('card_icon', __('卡片icon'))->help('更多icon图标访问 <a href="https://fontawesome.com" target="_blank">https://fontawesome.com</a>,填写该icon完整引用,示例[fab fa-php、far fa-futbol]')->required()->rules('required');
        $form->textarea('card_content', __('卡片描述'))->rules('required');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('card_show', '是否显示')->states($states)->default(1);
        $form->number('card_sort', __('卡片排序'))->default(100)->rules('integer|between:0,999999');

        return $form;
    }
}
