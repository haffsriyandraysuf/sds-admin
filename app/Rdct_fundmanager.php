<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdct_fundmanager extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'fund_manager', 'currency', 'paid_by'];

    public function rdct_fundname()
    {
        return $this->hasMany(Rdct_fundname::class);
    }
}
