<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_subscribes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',100)->comment('申请邮箱');
            $table->string('ip',50)->nullable(true)->comment('申请IP');
            $table->tinyInteger('is_pass')->default(1)->comment('审核状态【1待审核2审核通过3冻结封禁】');
            $table->tinyInteger('add_mode')->default(1)->comment('申请方式【1申请添加2后台添加】');
            $table->integer('aid')->default(0)->nullable(true)->comment('文章id');
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
        Schema::dropIfExists('blog_subscribes');
    }
}
