<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNavShare2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_nav_share2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('share_title')->comment('分享标题');
            $table->text('share_describe')->comment('分享描述');
            $table->string('share_note')->nullable(true)->comment('分享副标题');
            $table->string('share_src')->comment('分享封面');
            $table->string('share_link')->comment('分享链接');
            $table->integer('share_sort')->default(100)->comment('排序');
            $table->tinyInteger('share_show')->default(1)->comment('是否显示【1是2否】');
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
        Schema::dropIfExists('blog_nav_share2');
    }
}
