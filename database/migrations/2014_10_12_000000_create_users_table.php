<!-- 使用者表格 -->
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateUsersTable extends Migration
{
    // 執行資料庫異動
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $connection = 'pgsql';
    public function up()
    {
        //建立資料表
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',50);
            $table->string('password',60);
            //A：管理者、G：一般會員
            $table->string('type',1)->default('G');
            $table->string('nickname',50);
            //原味純茶投票次數
            $table->string('O_vote',1)->default('F');
            //拿鐵鮮奶投票次數
            $table->string('M_vote',1)->default('F');
            //手調風味投票次數
            $table->string('S_vote',1)->default('F');
            $table->timestamps();
            $table->unique(['email'],'user_email_uk');

        });
    }

    //復原資料庫異動
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //移除資料表
        Schema::dropIfExists('users');
    }
}
