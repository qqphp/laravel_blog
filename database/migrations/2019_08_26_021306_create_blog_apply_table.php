<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_apply', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('apply_title')->comment('申请人博客名称');
            $table->string('apply_link')->comment('申请人博客网址');
            $table->string('apply_contact')->comment('申请人联系方式');
            $table->string('apply_ip')->comment('申请人IP');
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
        Schema::dropIfExists('blog_apply');
    }
}
