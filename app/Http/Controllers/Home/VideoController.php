<?php

namespace App\Http\Controllers\home;

use App\Models\BlogMessage;
use App\Models\BlogNavVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * 视频列表
     */
    public function index(Request $request)
    {
        $nav_id      = $request->route('nav_id');
        $video_model = new BlogNavVideo();
        if ($nav_id) {
            $recommended_video = $video_model::where('nav_id', $nav_id)->where('video_show', 1)->where('video_recommend', 1)->limit(8)->orderBy('video_sort', 'desc')->orderBy('id', 'desc')->get();
            //视频数据集
            $video_result = $video_model::where('nav_id', $nav_id)->where('video_show', 1)->orderBy('video_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        } else {
            $recommended_video = $video_model::where('video_show', 1)->where('video_recommend', 1)->limit(8)->orderBy('video_sort', 'desc')->orderBy('id', 'desc')->get();
            //视频数据集
            $video_result = $video_model::where('video_show', 1)->orderBy('video_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        }
        return view('home.video.index', compact('video_result', 'recommended_video'));
    }

    /**
     * 视频详情
     */
    public function video_details(Request $request, BlogNavVideo $videoModel)
    {
        $vid          = $request->route('vid');
        $video_result = $videoModel::find($vid);
        //获取本篇视频所属留言
        $video_message = BlogMessage::where('foreign_id', $vid)->orderBy('id', 'desc')->paginate(6);
        //获取留言的背景色
        $bg_arr = define_background();
        //获取徽章颜色
        $badge_arr = define_badge_color();
        //点击量自增
        $videoModel::where('id', $vid)->increment('video_click');
        return view('home.video.video_details', compact('video_result', 'video_message', 'bg_arr', 'badge_arr'));
    }
}
