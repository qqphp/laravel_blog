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