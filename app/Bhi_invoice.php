<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bhi_invoice extends Model
{
    protected $fillable = [
        'no_invoice',
        'periode',
        'produk',
        'total',
        'ppn',
        'pph',
        'amount'
    ];

    public function bhi_detail()
    {
        return $this->hasMany(Bhi_detail::class);
    }
}
