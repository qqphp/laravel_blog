<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //进入网站首页
    public function index()
    {
        return view('home.index.index');
    }
}
