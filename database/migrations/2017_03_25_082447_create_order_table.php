<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 16)->comment('用户ID');
            $table->integer('price')->comment('价格');
            $table->unsignedTinyInteger('pay_status')->comment('支付状态');
            $table->text('products')->comment('商品列表');
            $table->string('consignee', 16)->comment('收件人姓名');
            $table->string('consignee_tel', 16)->comment('收件人手机号');
            $table->string('address', 100)->comment('收件人地址');
            $table->string('remark')->comment('备注');
            $table->string('express_id')->comment('物流编号');
            $table->unsignedTinyInteger('status')->comment('状态 1未付款 2已付 3已发货 4已完成 5无效');
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
        Schema::dropIfExists('orders');
    }
}
