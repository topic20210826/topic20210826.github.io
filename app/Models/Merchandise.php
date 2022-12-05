<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "name",
        "big_price",
        "small_price",
        "status",
        "kind",

        "size",
        "sweet",
        "ice",
        "content",
        "count",

    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'merchandise_status_idx' => 'datetime',
    ];
}
