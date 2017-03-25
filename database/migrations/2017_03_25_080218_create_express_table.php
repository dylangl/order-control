<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('express', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company', 20)->comment('物流公司');
            $table->string('number', 20)->comment('运单号');
            $table->integer('price')->comment('价格');
            $table->unsignedTinyInteger('status')->comment('状态');
            $table->string('receiver')->comment('收件人信息');
            $table->string('sender')->comment('发货人信息');
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
        Schema::dropIfExists('express');
    }
}
