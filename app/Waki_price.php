<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waki_price extends Model
{
    protected $fillable = [
        'price_material',
        'cost_service'
    ];
}
