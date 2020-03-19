<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bhi_detail extends Model
{
    protected $fillable = [
        'sub_produk',
        'bhi_invoice_id',
        'qty_print',
        'qty_insert',
        'material_printing',
        'cost_printing',
        'material_inserting',
        'cost_inserting',
        'biaya_kertas',
        'biaya_amplop',
    ];

    public function bhi_invoice()
    {
        return $this->belongsTo(Bhi_invoice::class);
    }
}
