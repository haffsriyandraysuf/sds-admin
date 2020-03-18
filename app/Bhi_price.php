<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bhi_price extends Model
{
    protected $fillable = [
      'produk',
      'sub_produk',
      'material_printing',
      'cost_printing',
      'material_inserting',
      'cost_inserting',
      'biaya_kertas',
      'biaya_amplop',
    ];
}
