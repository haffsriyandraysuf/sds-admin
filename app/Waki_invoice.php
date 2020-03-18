<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waki_invoice extends Model
{
    protected $fillable = [
        'no_invoice',
        'bank',
        'nama_file',
        'qty_printing',
        'price_material',
        'cost_service',
        'total',
        'ppn',
        'amount',
        'tProses',
        'tTerima'
    ];
}
