<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdct_invoice extends Model
{
    protected $fillable = [
      'no_invoice',
      'rdct_fundname_id',
      'periode',
      'qty_printing',
      'qty_inserting',
      'price_printing',
      'price_inserting',
      'cost_printing',
      'cost_inserting',
      'total',
      'ppn',
      'pph',
      'amount'
    ];
    public function rdct_fundname()
    {
        return $this->belongsTo(Rdct_fundname::class);
    }
}
