<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogAbout;

class AboutController extends Controller
{
    /**
     * Desc:关于我个人信息展示
     * Date:2019/9/3/003
     */
    public function index(BlogAbout $blogAbout)
    {
        $about_data = $blogAbout::with([
            'article' => function ($query) {
                $query->where('article_show', '=', 1);
            },
            'card1'   => function ($query) {
                $query->where('card_show', '=', 1)->orderBy('card_sort','desc')->orderBy('id', 'desc');
            },
            'card2'   => function ($query) {
                $query->where('card_show', '=', 1)->orderBy('card_sort','desc')->orderBy('id', 'desc');
            },
        ])->where('about_show', 1)->get();
        return view('home.about.index')->with('about_data', $about_data);
    }
}
