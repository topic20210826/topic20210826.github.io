<?php

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //資料表名稱
    protected $table = 'transaction';
    protected $promaryKey = 'id';
    protected $fillable = [
        "user_id",
        "merchandise_id",
        "merchandise_name",
        "type",
        "price",
        "count",
        "total_price",
        "size",
        "sweet",
        "ice",
        "tapioca",
        "red",
        "iu",
        "eigo",
        "user",
    ];
}
