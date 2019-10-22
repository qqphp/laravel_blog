<?php

namespace App\Http\Controllers\home;

use App\Models\BlogNavPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class PhotoController
 * @package App\Http\Controllers\home
 */
class PhotoController extends Controller
{
    /**
     * 相册列表
     */
    public function index(Request $request)
    {
        $nav_id      = $request->route('nav_id');
        $photo_model = new BlogNavPhoto();
        if ($nav_id) {
            $photo_result = $photo_model::where('nav_id', $nav_id)->where('photo_show', 1)->orderBy('photo_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        } else {
            $photo_result = $photo_model::where('photo_show', 1)->orderBy('photo_sort', 'desc')->orderBy('id', 'desc')->paginate(8);
        }

        return view('home.photo.index', compact('photo_result'));
    }

    /**
     * 相册详情
     */
    public function photo_details(Request $request, BlogNavPhoto $photoModel)
    {
        $pid            = $request->route('pid');
        $details_result = $photoModel::find($pid);
        $photo_result   = empty($details_result->photo_json) ? [] : $details_result->photo_json;
        //点击量自增
        $photoModel::where('id', $pid)->increment('photo_click');
        return view('home.photo.photo_details', compact('photo_result', 'details_result'));
    }

}
