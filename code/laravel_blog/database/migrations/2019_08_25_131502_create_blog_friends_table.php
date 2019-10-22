<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_friends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('friends_title')->comment('博客名称');
            $table->string('friends_link')->comment('博客链接');
            $table->string('friends_describe')->nullable(true)->comment('博客描述');
            $table->string('friends_contact')->comment('联系方式');
            $table->tinyInteger('friends_show')->default(1)->comment('是否显示【1是2否】');
            $table->tinyInteger('friends_recommend')->default(2)->comment('是否显示【1是2否】');
            $table->tinyInteger('friends_type')->default(0)->comment('添加方式【1申请添加2后台添加】');
            $table->integer('friends_sort')->default(100)->comment('排序');
            $table->tinyInteger('friends_examine')->default(2)->comment('审核状态【1通过2正在审核3审核失败】');
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
        Schema::dropIfExists('blog_friends');
    }
}
