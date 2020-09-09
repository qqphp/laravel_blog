<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNavArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_nav_article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('article_title')->comment('文章标题');
            $table->string('article_tag')->nullable(true)->comment('文章标签');
            $table->text('article_content')->comment('文章内容');
            $table->text('article_describe')->nullable(true)->comment('文章描述');
            $table->integer('article_click')->default(0)->comment('点击量');
            $table->tinyInteger('article_show')->default(1)->comment('是否显示【1是2否】');
            $table->integer('article_sort')->default(100)->comment('文章排序');
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
        Schema::dropIfExists('blog_nav_article');
    }
}
