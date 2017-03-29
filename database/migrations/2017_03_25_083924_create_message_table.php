<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户ID');
            $table->text('content')->comment('留言内容');
            $table->integer('parent_id')->comment('父ID');
            $table->integer('replier_id')->comment('回复人ID');
            $table->unsignedTinyInteger('status')->comment('状态 1未读 2已读 3已解决');
            $table->unsignedTinyInteger('is_deleted')->comment('是否删除');
            $table->timestamps();
            $table->index('created_at');
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
        Schema::dropIfExists('messages');
    }
}
