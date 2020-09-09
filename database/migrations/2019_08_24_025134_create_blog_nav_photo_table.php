<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNavPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_nav_photo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_title')->comment('相册标题');
            $table->string('photo_img')->comment('相册封面');
            $table->string('photo_tag')->nullable(true)->comment('相册标签');
            $table->text('photo_json')->nullable(true)->comment('相册上传图片');
            $table->integer('photo_click')->default(0)->comment('点击量');
            $table->tinyInteger('photo_show')->default(1)->comment('是否显示【1是2否】');
            $table->integer('photo_sort')->default(100)->comment('相册排序');
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
        Schema::dropIfExists('blog_nav_photo');
    }
}
