<?php

namespace App\Admin\Controllers;

use App\Models\BlogNavVideo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BlogNavVideoController extends AdminController
{
    protected $nav_name = [];

    public function __construct()
    {
        $this->nav_name = DB::table('blog_nav')->where('nav_type', 4)->pluck('nav_title', 'id')->toArray();
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogNavVideo';

    public function index(Content $content)
    {
        return $content->header('内容管理')->description('视频管理')->body($this->grid($this->nav_name));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($nav_name)
    {
        $grid = new Grid(new BlogNavVideo);
        $grid->model()->orderBy('video_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('id', 'ID');
        $grid->column('nav_id', '所属导航')->display(function ($nav_id) use ($nav_name) {
            return $nav_name[$nav_id];
        });
        $grid->column('video_title', '视频标题')->editable();
        $grid->column('video_tag', '视频标签')->display(function ($video_tag) {
            $video_tag = empty($video_tag) ? '' : explode(',', $video_tag);
            return $video_tag;
        })->label('success');;
        $grid->column('video_img', '视频封面')->image();
        $grid->column('video_link', '视频链接');
        $grid->column('video_click', '点击量');
        $grid->column('video_sort', '视频排序');
        $grid->column('video_recommend', '是否推荐')->using([1 => '推荐', 2 => '关闭']);;
        $grid->column('video_show', '是否显示')->using([1 => '显示', 2 => '隐藏']);;

        $grid->filter(function ($filter) use ($nav_name) {
            $filter->equal('nav_id', '所属导航')->select($nav_name);
            $filter->like('video_title', '文章标题');
            $filter->equal('video_show', '是否隐藏')->select([1 => '显示', 2 => '隐藏']);
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
        $show = new Show(BlogNavVideo::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogNavVideo);
        $form->select('nav_id', '所属导航')->options($this->nav_name)->rules('required|integer');
        $form->text('video_title', '视频标题')->attribute('autocomplete', 'off')->required()->rules('required|max:40');
        $form->tags('video_tag', '视频标签')->help('建议使用标签总数量不超过6个');
        $form->textarea('video_describe', '视频描述')->rules('required');
        $form->image('video_img', '视频封面')->uniqueName()->attribute('accept', 'image/*')->required();
        $form->number('video_click', '点击量')->default(0)->rules('integer|between:0,999999');
        $form->number('video_sort', '视频排序')->default(100)->rules('integer|between:0,999999');
        $recommend = [
            'on'  => ['value' => 1, 'text' => '推荐', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '关闭', 'color' => 'danger'],
        ];
        $form->switch('video_recommend', '是否推荐')->states($recommend)->default(2);
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('video_show', '是否显示')->states($states)->default(1);

        $form->largefile('video_link', '所属视频')->attribute('accept', 'video/*')->rules('required');

        return $form;
    }
}
