<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_notices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('notice_title',100)->comment('公告标题');
            $table->longText('notice_content')->comment('公告内容');
            $table->integer('notice_sort')->default(100)->comment('公告排序');
            $table->tinyInteger('notice_show')->default(1)->comment('是否显示【1是2否】');
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
        Schema::dropIfExists('blog_notices');
    }
}
