<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 16)->comment('名称');
            $table->string('url')->comment('路由');
            $table->string('icon')->comment('图标');
            $table->integer('sort', 2)->comment('排序');
            $table->unsignedTinyInteger('status')->comment('状态');
            $table->unsignedTinyInteger('is_deleted')->comment('是否删除');
            $table->timestamps();
            $table->index('status');
            $table->index('is_deleted');
        });

        Schema::create('group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 16)->comment('名称');
            $table->string('rules')->comment('路由');
            $table->unsignedTinyInteger('status')->comment('状态');
            $table->unsignedTinyInteger('is_deleted')->comment('是否删除');
            $table->timestamps();
            $table->index('status');
            $table->index('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rule');
        Schema::drop('group');
    }
}
