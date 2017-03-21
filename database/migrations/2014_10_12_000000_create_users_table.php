<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('用户名');
            $table->string('password')->comment('密码');
            $table->string('full_name')->comment('姓名');
            $table->string('email')->comment('邮箱');
            $table->string('phone')->comment('手机号码');
            $table->unsignedTinyInteger('group_id')->comment('分组ID');
            $table->unsignedTinyInteger('status')->comment('状态');
            $table->string('reg_ip')->comment('注册IP');
            $table->unsignedTinyInteger('is_deleted')->comment('是否删除');
            $table->integer('last_time')->comment('上次登录时间');
            $table->string('last_ip')->comment('上次登录IP');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
