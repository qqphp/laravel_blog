<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\StoreBlogFriendsPost;
use App\Models\BlogFriends;
use App\Http\Controllers\Controller;

class FriendsController extends Controller
{
    /**
     * Desc:友情链接展示
     * Date:2019/9/3/003
     */
    public function index(BlogFriends $blogFriends)
    {
        //1.获取友情链接
        $recommend_link = $blogFriends::where('friends_show', 1)->where('friends_examine', 1)->orderBy('friends_sort', 'desc')->orderBy('id', 'asc')->get();
        $recommend_list = collect();
        $normal_list    = collect();
        foreach ($recommend_link as $item) {
            $item->friends_img = empty($item->friends_img) ? config('app.default_avatar') : $item->friends_img;
            if ($item->friends_recommend == 1) {
                $recommend_list->push($item);
            } else {
                $normal_list->push($item);
            }
        }
        return view('home.friends.index')->with('recommend_list', $recommend_list)->with('normal_list', $normal_list);
    }

    public function store(StoreBlogFriendsPost $request)
    {
        $friends_title               = $request->input('friends_title');
        $friends_link                = $request->input('friends_link');
        $friends_contact             = $request->input('friends_contact');
        $blogModel                   = new BlogFriends();
        $blogModel->friends_title    = $friends_title;
        $blogModel->friends_link     = $friends_link;
        $blogModel->friends_describe = '';
        $blogModel->friends_contact  = $friends_contact;
        $blogModel->friends_show     = 2;
        $blogModel->friends_type     = 1;
        $blogModel->save();

        $result = array(
            'status' => 1,
            'msg'    => '申请成功',
            'result' => []
        );
        return json_encode($result, true);
    }
}
