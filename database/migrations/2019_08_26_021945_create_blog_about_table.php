<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_about', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_title')->comment('关于标题');
            $table->text('about_describe')->nullable(true)->comment('关于描述');
            $table->string('about_type')->comment('关于类型【1单页2卡片页3图标页】');
            $table->integer('about_sort')->default(100)->comment('关于排序');
            $table->tinyInteger('about_show')->default(1)->comment('是否显示【1是2否】');
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
        Schema::dropIfExists('blog_about');
    }
}
