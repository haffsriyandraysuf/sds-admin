<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdct_price extends Model
{
    protected $fillable = ['material_printing', 'material_inserting', 'cost_printing', 'cost_inserting'];
}
