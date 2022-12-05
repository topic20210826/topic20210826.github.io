<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'pgsql';
    public function up()
    {
        Schema::create('merchandise', function (Blueprint $table) {
            $table->increments('id');
            //商品名稱
            $table->string('name',80)->nullable();
            //大杯價錢
            $table->integer('big_price')->default(0);
            //小杯價錢
            $table->integer('small_price')->default(0);
            //C：建立中 , S : 可販售
            $table->string('status',1)->default('C');
            //類別
            //O：原味純茶, M : 拿鐵鮮奶 S:手調風味
            $table->string('kind',1)->default('O');
            //投票數
            $table->integer('vote')->default(0);

            $table->timestamps();
            $table->index(['status'],'merchandise_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise');
    }
}
