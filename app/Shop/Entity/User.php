<?php

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    //資料表名稱
    protected $table = 'users';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可以大量指定異動的欄位
    protected $fillable = [
        "email",
        "password",
        "type",
        "nickname",
        "O_vote",
        "M_vote",
        "S_vote",
    ];
}
?>
