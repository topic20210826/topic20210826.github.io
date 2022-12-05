<?php

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model {
    protected $table = 'merchandise';
    //主鍵名稱
    protected $promaryKey = 'id';
    //可以大量指定異動的欄位
    protected $fillable = [
        "name",
        "big_price",
        "small_price",
        "status",
        "kind",
        "vote",

        "size",
        "sweet",
        "ice",
        "content",
        "count",

    ];
}
?>
