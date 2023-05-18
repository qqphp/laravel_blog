<?php

namespace App\Admin\Controllers;

use App\Models\BlogNavPhoto;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BlogNavPhotoController extends AdminController
{
    protected $nav_name = [];

    public function __construct()
    {
        $this->nav_name = DB::table('blog_nav')->where('nav_type', 2)->pluck('nav_title', 'id')->toArray();
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogNavPhoto';

    public function index(Content $content)
    {
        return $content->header('内容管理')->description('相册管理')->body($this->grid($this->nav_name));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($nav_name)
    {
        $grid = new Grid(new BlogNavPhoto);
        $grid->model()->orderBy('photo_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('id', 'ID');
        $grid->column('nav_id', '所属导航')->display(function ($nav_id) use ($nav_name) {
            return $nav_name[$nav_id];
        });
        $grid->column('photo_title', '相册标题');
        $grid->column('photo_img', '相册封面')->image();
        $grid->column('photo_tag', '相册标签')->display(function ($photo_tag) {
            $photo_tag = empty($photo_tag) ? '' : explode(',', $photo_tag);
            return $photo_tag;
        })->label('success');
        $grid->column('photo_click', '点击量');
        $grid->column('photo_show', '是否显示')->using([1 => '显示', 2 => '隐藏']);
        $grid->column('photo_sort', '相册排序');
        $grid->column('created_at', '添加时间');
        $grid->filter(function ($filter) use ($nav_name) {
            $filter->equal('nav_id', '所属导航')->select($nav_name);
            $filter->like('article_title', '文章标题');
            $filter->equal('article_show', '是否隐藏')->select([1 => '显示', 2 => '隐藏']);
        });
        $grid->filter(function ($filter) {

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
        $show = new Show(BlogNavPhoto::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogNavPhoto);
        $form->select('nav_id', '所属导航')->options($this->nav_name)->rules('required|integer');
        $form->text('photo_title', '相册标题')->required()->attribute('autocomplete', 'off')->rules('required|max:80');
        $form->image('photo_img', '相册封面')->uniqueName()->attribute('accept', 'image/*')->required()->rules('required');
        $form->tags('photo_tag', '相册标签')->help('建议使用标签总数量不超过6个');
        $form->number('photo_click', '点击量')->default(0)->rules('required|integer|between:0,999999');
        $form->number('photo_sort', '相册排序')->default(100)->rules('required|integer|between:0,999999');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('photo_show', '是否显示')->states($states)->default(1);
        $form->multipleImage('photo_json', '所属照片')->uniqueName()->attribute('accept', 'image/*')->removable()->sortable()->rules('required');
        return $form;
    }
}
