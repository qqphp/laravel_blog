<?php

namespace App\Http\Controllers\home;

use App\Models\BlogNavShareTwo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardTwoController extends Controller
{
    /**
     * 卡片列表
     */
    public function index(Request $request)
    {
        $nav_id = $request->route('nav_id');

        $cardModel = new BlogNavShareTwo();
        if ($nav_id) {
            $result_list = $cardModel::where('share_show', 1)->where('nav_id', $nav_id)->orderBy('share_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        } else {
            $result_list = $cardModel::where('share_show', 1)->orderBy('share_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        }
        return view('home.card2.index', compact('result_list'));
    }
}
