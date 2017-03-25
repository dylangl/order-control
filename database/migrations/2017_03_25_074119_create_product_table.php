<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->comment('商品名称');
            $table->integer('price')->comment('价格');
            $table->string('unit', 10)->comment('单位');
            $table->string('brand', 16)->comment('品牌');
            $table->string('pic')->comment('图片地址');
            $table->string('detail')->comment('商品详情');
            $table->string('classify_id')->comment('商品分类ID');
            $table->unsignedTinyInteger('is_show')->comment('是否上架');
            $table->unsignedTinyInteger('is_deleted')->comment('是否删除');
            $table->timestamps();
            $table->index('created_at');
            $table->index('is_deleted');
            $table->index('is_show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
