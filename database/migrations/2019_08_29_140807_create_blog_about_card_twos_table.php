<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAboutCardTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_about_card_twos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('card_title',100)->comment('卡片标题');
            $table->string('card_icon',50)->comment('卡片ICON');
            $table->string('card_background',100)->nullable(true)->comment('卡片背景');
            $table->tinyInteger('card_show')->default(1)->comment('是否显示【1是2否】');
            $table->integer('card_sort')->default(100)->comment('卡片排序');
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
        Schema::dropIfExists('blog_about_card_twos');
    }
}
