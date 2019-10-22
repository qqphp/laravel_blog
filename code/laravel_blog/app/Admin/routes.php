<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('blog-navs', BlogNavController::class);
    $router->resource('blog-nav-articles', BlogNavArticleController::class);
    $router->resource('blog-nav-photos', BlogNavPhotoController::class);
    $router->resource('blog-nav-musics', BlogNavMusicController::class);
    $router->resource('blog-nav-videos', BlogNavVideoController::class);
    $router->resource('blog-nav-share-ones', BlogNavShareOneController::class);
    $router->resource('blog-nav-share-twos', BlogNavShareTwoController::class);
    $router->resource('blog-upload-files', BlogUploadFileController::class);
    $router->resource('blog-messages', BlogMessageController::class);
    $router->resource('blog-friends', BlogFriendsController::class);
    $router->resource('blog-notices', BlogNoticeController::class);
    $router->resource('blog-abouts', BlogAboutController::class);
    $router->resource('blog-about-articles', BlogAboutArticleController::class);
    $router->resource('blog-about-card-ones', BlogAboutCardOneController::class);
    $router->resource('blog-about-card-twos', BlogAboutCardTwoController::class);
    $router->resource('blog-subscribes', BlogSubscribeController::class);
});
