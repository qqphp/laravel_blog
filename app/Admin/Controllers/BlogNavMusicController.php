<?php

namespace App\Admin\Controllers;

use App\Models\BlogNavMusic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BlogNavMusicController extends AdminController
{
    protected $nav_name = [];

    public function __construct()
    {
        $this->nav_name = DB::table('blog_nav')->where('nav_type', 3)->pluck('nav_title', 'id')->toArray();
    }

    public function index(Content $content)
    {
        return $content->header('内容管理')->description('歌单管理')->body($this->grid($this->nav_name)); // TODO: Change the autogenerated stub
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BlogNavMusic';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($nav_name)
    {
        $grid = new Grid(new BlogNavMusic);
        $grid->model()->orderBy('music_sort', 'desc')->orderBy('id', 'desc');
        $grid->column('id', 'ID');
        $grid->column('nav_id', '所属导航')->display(function ($nav_id) use ($nav_name) {
            return $nav_name[$nav_id];
        });;
        $grid->column('music_title', '歌单标题');
        $grid->column('music_tag', '歌单标签')->display(function ($music_tag) {
            $music_tag = empty($music_tag) ? '' : explode(',', $music_tag);
            return $music_tag;
        })->label('success');
        $grid->column('music_img', '歌单封面')->image();
        $grid->column('music_click', '点击量');
        $grid->column('music_show', '是否显示')->using([1 => '显示', 2 => '隐藏']);
        $grid->column('music_play', '添加播放列表')->using([1 => '是', 2 => '否']);
        $grid->column('music_sort', '歌单排序');

        $grid->filter(function ($filter) use ($nav_name) {
            $filter->equal('nav_id', '所属导航')->select($nav_name);
            $filter->like('music_title', '文章标题');
            $filter->equal('music_show', '是否隐藏')->select([1 => '显示', 2 => '隐藏']);
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
        $show = new Show(BlogNavMusic::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogNavMusic);
        $form->select('nav_id', '所属导航')->options($this->nav_name)->rules('required|integer');
        $form->text('music_title', '歌单标题')->attribute('autocomplete', 'off')->required()->rules('required|max:80');
        $form->tags('music_tag', '歌单标签')->help('建议使用标签总数量不超过6个');
        $form->textarea('music_describe', '歌单描述')->rules('required');
        $form->image('music_img', '歌单封面')->uniqueName()->attribute('accept', 'image/*')->required();

        $form->number('music_click', '点击量')->default(0)->rules('integer|between:0,999999');
        $form->number('music_sort', '歌单排序')->default(100)->rules('integer|between:0,999999');
        $states = [
            'on'  => ['value' => 1, 'text' => '显示', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '隐藏', 'color' => 'danger'],
        ];
        $form->switch('music_show', '是否显示')->states($states)->default(1);
        $play = [
            'on'  => ['value' => 1, 'text' => '是', 'color' => 'info'],
            'off' => ['value' => 2, 'text' => '否', 'color' => 'danger'],
        ];
        $form->switch('music_play', '添加播放列表')->states($play)->default(1);
        $form->multipleFile('music_json', '所属歌曲')->attribute('accept', 'audio/*')->removable()->sortable();
        return $form;
    }
}
