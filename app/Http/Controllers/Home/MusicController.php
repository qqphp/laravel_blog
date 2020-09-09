<?php

namespace App\Http\Controllers\home;

use App\Models\BlogNavMusic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MusicController extends Controller
{
    /**
     * 音乐歌单
     */
    public function index(Request $request)
    {
        $nav_id = $request->route('nav_id');

        $music_model = new BlogNavMusic();
        if ($nav_id) {
            $music_result = $music_model::where('nav_id', $nav_id)->where('music_show', 1)->orderBy('music_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        } else {
            $music_result = $music_model::where('music_show', 1)->orderBy('music_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        }
        return view('home.music.index')->with('music_result', $music_result);
    }

    /**
     * 音乐歌单详情列表
     */
    public function music_details(Request $request, BlogNavMusic $musicModel)
    {
        $mid          = $request->route('mid');
        $music_result = $musicModel::find($mid);
        //获取徽章颜色
        $badge_arr = define_badge_color();
        //点击量自增
        $musicModel::where('id', $mid)->increment('music_click');
        return view('home.music.music_details', compact('music_result', 'badge_arr'));
    }
}
