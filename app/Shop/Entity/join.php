<?php

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

class join extends Model {
    protected $table = 'join';
    //主鍵名稱
    protected $promaryKey = 'id';
    //可以大量指定異動的欄位
    protected $fillable = [
        'team_id',
        "name",
        "price",
        "merchandise",
        "arrived_data",
        "status",
        "people_number",
        "user_id",
        'type',

    ];
}
?>
