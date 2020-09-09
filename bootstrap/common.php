<?php

/**
 * 递归无限级分类
 */
function modelTree($tree,$pid = 0,$level = 0){
    if(count($tree) == 0){
        return [];
    }
    $arr = [];
    foreach ($tree as $k => $v) {
        if($v['nav_pid'] == $pid){
            $v['level'] = $level;
            $arr[$v['id']] = $v;
            $temp_arr = modelTree($tree,$v['id'],$level+1);
            $arr  = array_merge($arr,$temp_arr);
        }
    }
    return $arr;
}

/**
 * 定义的背景色数组
 */
function define_background(){
    $bg = array('purple','orange','brown','yellow','green','blue');
    shuffle($bg);
    return $bg;
}

/**
 * Desc:定义徽章颜色
 * Date:2019/9/27/027
 */
function define_badge_color(){
    $bg = array('primary','info','success','warning','danger','default');
    shuffle($bg);
    return $bg;
}

/**
 * 转换日期，比如2019-09-21 11:54:53,只显示2019-09-21
 */
function date_conversion($old_data){
    $old_time = strtotime($old_data);
    return $new_time = date('Y-m-d',$old_time);
}

/**
 * Desc:处理文件是本地上传还是七牛云上传的路径
 * Date:2019/11/6/006
 */
function processing_files($file_src){
    if(env('UPLOAD_TYPE') == 'admin'){
        $new_src = asset(__STATIC_UPLOADS__.'/'.$file_src);
    }elseif (env('UPLOAD_TYPE') == 'qiniu'){
        $file_setting = config('filesystems');
        $new_src = 'http://'.$file_setting['disks']['qiniu']['domains']['default'].'/'.$file_src;
    }
    return $new_src;
}