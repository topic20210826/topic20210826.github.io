<?php

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //資料表名稱
    protected $table = 'ticket';
    protected $promaryKey = 'id';
    //可以大量指定異動的欄位
    protected $fillable = [
        "name",
        "user_id",
        "type",
        'price',

    ];
}
