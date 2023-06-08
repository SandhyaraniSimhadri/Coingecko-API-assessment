<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoingeckoCoin extends Model
{
    protected $fillable = [
        'coin_id',
        'symbol',
        'name',
        'platforms',
    ];

    protected $casts = [
        'platforms' => 'array',
    ];
}
