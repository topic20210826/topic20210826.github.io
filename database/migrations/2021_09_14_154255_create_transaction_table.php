<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'pgsql';
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            //使用者名稱
            $table->integer('user_id');
            //使用者名稱
            $table->string('user', 80)->nullable();
            //商品id => 會顯示商品名字
            $table->integer('merchandise_id');
            //商品名稱
            $table->string('merchandise_name', 80)->nullable();
            //訂單類別(C：確認是否購買訂單、B：已購買的訂單、O：已完成訂單)
            $table->string('type',1)->default('C');
            //商品單價
            $table->integer('price');
            //購買數量
            $table->integer('count');
            //總價格
            $table->integer('total_price');
            //大小
            $table->string('size', 1)->default('B');
            //甜度(F:正常 S:少糖 H:半糖 M:微糖 N:無糖)
            $table->string('sweet', 1)->default('F');
            //冰度(F:正常 S:少冰 M:微冰 N:去冰)
            $table->string('ice', 1)->default('F');
            //加料
            //珍珠(10元)
            $table->string('tapioca', 1)->default('N');
            //紅豆(10元)
            $table->string('red', 1)->default('N');
            //愛玉(10元)
            $table->string('iu', 1)->default('N');
            //椰果(10元)
            $table->string('eigo', 1)->default('N');
            $table->timestamps();
            $table->index(['user_id'], 'user_transaction_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
