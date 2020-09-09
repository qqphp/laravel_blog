<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAboutArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_about_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('articles_title')->comment('单页标题');
            $table->longText('articles_content')->comment('单页内容');
            $table->tinyInteger('article_show')->default(1)->comment('是否显示【1是2否】');
            $table->integer('article_sort')->default(100)->comment('单页排序');
            $table->integer('notice_id')->default(0)->comment('所属关于id');
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
        Schema::dropIfExists('blog_about_articles');
    }
}
