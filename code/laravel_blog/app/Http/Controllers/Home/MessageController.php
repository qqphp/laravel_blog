<?php

namespace App\Http\Controllers\home;

use App\Models\BlogMessage;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * 留言列表
     */
    public function index()
    {
        $blogModel   = new BlogMessage();
        $result_list = $blogModel::where('msg_show', 1)->where('msg_type', 3)->orderBy('id', 'desc')->paginate(6);

        //获取留言的背景色
        $bg_arr = define_background();
        return view('home.message.index', compact('result_list', 'bg_arr'));
    }
}
