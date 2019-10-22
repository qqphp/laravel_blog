<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//配置网站前台路由规则
Route::middleware(['laravel_pjax'])->name('home.')->group(function (){
    Route::get('/','Home\IndexController@index')->name('index');
    Route::match(['get','post'],'article/{nav_id?}','Home\ArticleController@index')->name('article');
    Route::get('about','Home\AboutController@index')->name('about');
    Route::get('friends','Home\FriendsController@index')->name('friends');
    Route::get('article_details/{aid}','Home\ArticleDetailController@index')->name('article_details');
    Route::get('photo/{nav_id?}','Home\PhotoController@index')->name('photo');
    Route::get('photo_details/{pid}','Home\PhotoController@photo_details')->name('photo_details');
    Route::get('music/{nav_id?}','Home\MusicController@index')->name('music');
    Route::get('music_details/{mid}','Home\MusicController@music_details')->name('music_details');
    Route::get('video/{nav_id?}','Home\VideoController@index')->name('video');
    Route::get('video_details/{vid}','Home\VideoController@video_details')->name('video_details');
    Route::get('card1/{nav_id?}','Home\CardOneController@index')->name('card1');
    Route::get('card2/{nav_id?}','Home\CardTwoController@index')->name('card2');
    Route::get('message','Home\MessageController@index')->name('message');
});
Route::name('home.')->group(function(){
    Route::post('message_msg','Home\MessageController@message_msg')->name('message_msg');
    Route::post('video_msg','Home\VideoController@video_msg')->name('video_msg');
    Route::post('friends_store','Home\FriendsController@store')->name('friends_store');
    Route::post('subscribe','Home\ArticleController@subscribe')->name('subscribe');
    Route::post('article_msg','Home\ArticleDetailController@article_msg')->name('article_msg');
});
