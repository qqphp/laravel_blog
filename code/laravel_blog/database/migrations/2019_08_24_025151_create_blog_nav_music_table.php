<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNavMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_nav_music', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('music_title')->comment('歌单标题');
            $table->text('music_describe')->comment('歌单描述');
            $table->string('music_tag')->nullable(true)->comment('歌单标签');
            $table->text('music_json')->nullable(true)->comment('歌单上传歌曲');
            $table->string('music_img')->comment('歌单封面');
            $table->integer('music_click')->default(0)->comment('点击量');
            $table->tinyInteger('music_show')->default(1)->comment('是否显示【1是2否】');
            $table->tinyInteger('music_play')->default(1)->comment('添加播放列表【1是2否】');
            $table->integer('music_sort')->default(100)->comment('歌单排序');
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
        Schema::dropIfExists('blog_nav_music');
    }
}
