<?php

namespace App\Providers;

use App\Models\BlogAboutCardTwo;
use App\Models\BlogFriends;
use App\Models\BlogNav;
use App\Models\BlogNavArticle;
use App\Models\BlogNavMusic;
use App\Models\BlogNavPhoto;
use App\Models\BlogNavShareOne;
use App\Models\BlogNavShareTwo;
use App\Models\BlogNavVideo;
use App\Observers\BlogAboutCardTwoObserver;
use App\Observers\BlogConfigObserver;
use App\Observers\BlogFriendsObserver;
use App\Observers\BlogNavArticleObserver;
use App\Observers\BlogNavMusicObserver;
use App\Observers\BlogNavObserver;
use App\Observers\BlogNavPhotoObserver;
use App\Observers\BlogNavShareOneObserver;
use App\Observers\BlogNavShareTwoObserver;
use App\Observers\BlogNavVideoObserver;
use Encore\Admin\Config\Config;
use Encore\Admin\Config\ConfigModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $table = config('admin.extensions.config.table', 'admin_config');
        if (Schema::hasTable($table)) {
            Config::load();
        }
        Schema::defaultStringLength(191); //add fixed sql
        //共享配置信息
        View::share('configs', $this->system_config());
        //共享导航栏列表
        View::share('nav_list', $this->system_nav());
        //共享音乐列表数据
        View::share('my_music', $this->my_music());

        BlogNav::observe(BlogNavObserver::class);
        BlogNavPhoto::observe(BlogNavPhotoObserver::class);
        BlogNavMusic::observe(BlogNavMusicObserver::class);
        BlogNavVideo::observe(BlogNavVideoObserver::class);
        BlogNavShareOne::observe(BlogNavShareOneObserver::class);
        BlogNavShareTwo::observe(BlogNavShareTwoObserver::class);
        BlogFriends::observe(BlogFriendsObserver::class);
        BlogAboutCardTwo::observe(BlogAboutCardTwoObserver::class);
        BlogNavArticle::observe(BlogNavArticleObserver::class);
        ConfigModel::observe(BlogConfigObserver::class);
    }

    public function system_config()
    {
        $config_result = DB::table('admin_config')->pluck('value', 'name');
        return $config_result;
    }

    public function system_nav()
    {
//        $collection = new Collection();
        $top_data = DB::table('blog_nav')->where('nav_open', '=', 1)->where('nav_pid', '=', 0)->orderBy('nav_sort', 'asc')->get()->keyBy('id');
        $top_id   = $top_data->keys();
        $son_data = DB::table('blog_nav')->where('nav_open', '=', '1')->whereIn('nav_pid', $top_id)->orderBy('nav_sort', 'asc')->get();
        foreach ($son_data as $k => $v) {
            $top_data->get($v->nav_pid)->son_nav[$v->id] = $v;
        }
        return $top_data;
    }

    public function my_music()
    {
        $music_data  = Db::table('blog_nav_music')->select('id', 'music_json', 'music_img', 'music_title')->where('music_play', 1)->orderBy('music_sort', 'desc')->get();
        $music_array = $music_data->toArray();
        $music_list  = [];
        foreach ($music_array as $k => $v) {
            if ($v->music_json) {
                $obj_data = json_decode($v->music_json);
                foreach ($obj_data as $m) {
                    $music_obj['title']  = str_replace('files/', '', $m);
                    $music_obj['author'] = $v->music_title;
                    $music_obj['url']    = processing_files($m);
                    $music_obj['pic']    = processing_files($v->music_img);
                    $music_list[]        = $music_obj;
                }
            }
        }
        return json_encode($music_list);
    }
}
