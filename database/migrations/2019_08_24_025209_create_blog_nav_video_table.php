<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNavVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_nav_video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('video_title')->comment('视频标题');
            $table->text('video_describe')->comment('视频描述');
            $table->string('video_tag')->nullable(true)->comment('视频标签');
            $table->string('video_img')->comment('视频封面');
            $table->string('video_link')->comment('视频路径');
            $table->integer('video_click')->default(0)->comment('点击量');
            $table->integer('video_sort')->default(100)->comment('视频排序');
            $table->integer('video_recommend')->default(2)->comment('是否推荐【1是2否】');
            $table->tinyInteger('video_show')->default(1)->comment('是否显示【1是2否】');
            $table->integer('nav_id')->default(0)->comment('所属导航id');
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
        Schema::dropIfExists('blog_nav_video');
    }
}
