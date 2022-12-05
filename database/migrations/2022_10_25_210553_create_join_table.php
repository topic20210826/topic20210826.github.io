<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'pgsql';
    public function up()
    {
        Schema::create('join', function (Blueprint $table) {
            $table->increments('id');
            //團體id
            $table->integer('team_id');
            //團購名稱
            $table->string('name',80)->nullable();
            //參加人的id
            $table->integer('user_id');
            //折扣%
            $table->integer('price')->default(0);
            //折購商品名稱
            $table->string('merchandise',80)->nullable();
            //到期日期
            $table->dateTime('arrived_data');
            //C:完成 N:未完成
            $table->string('type',1)->default('N');
            //狀態
            //I:建立者
            $table->string('status',1)->default('I');
            //參加人數
            $table->integer('people_number')->default(0);

            $table->timestamps();
            $table->index(['name'],'join_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join');
    }
}
