<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_nav', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nav_title',150)->comment('导航名称');
            $table->integer('nav_type')->default(0)->comment('导航类型【1文章2照片3音乐4视频5软件(分享1)6图书(分享2)】');
            $table->tinyInteger('nav_open')->default(1)->comment('导航是否启用【1启用2关闭】');
            $table->integer('nav_sort')->default(100)->comment('导航排序');
            $table->integer('nav_pid')->default(0)->comment('导航上级id');
            $table->string('nav_route',100)->nullable(true)->comment('导航前端路由');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_nav');
    }
}
