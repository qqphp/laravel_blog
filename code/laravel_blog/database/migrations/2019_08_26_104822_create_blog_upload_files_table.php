<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogUploadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_upload_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_title')->comment('文件名称');
            $table->string('img_src')->comment('文件路径');
            $table->string('img_suffix',40)->comment('文件后缀');
            $table->integer('img_type')->comment('文件类型【1文章内容上传】');
            $table->string('img_ip')->comment('上传ip');
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
        Schema::dropIfExists('blog_upload_files');
    }
}
