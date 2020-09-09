<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_message', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('msg_content')->comment('留言内容');
            $table->string('msg_blog_name')->comment('留言博客名称');
            $table->string('msg_blog_link')->comment('留言博客链接');
            $table->string('msg_blog_contact')->comment('留言联系方式');
            $table->string('msg_ip')->nullable(true)->comment('留言人ip');
            $table->tinyInteger('msg_show')->default(1)->comment('是否显示【1是2否】');
            $table->tinyInteger('msg_type')->nullable(true)->default(0)->comment('留言类型【1文章2视频3留言板块】');
            $table->integer('foreign_id')->nullable(true)->default(0)->comment('所属类型主键id');
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
        Schema::dropIfExists('blog_message');
    }
}
