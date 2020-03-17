<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdct_fundname extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'fund_name', 'rdct_fundmanager_id', 'fn_code_old', 'addr1', 'addr2', 'addr3', 'addr4', 'npwp'];
    public function rdct_fundmanager()
    {
        return $this->belongsTo(Rdct_fundmanager::class);
    }
    public function rdct_invoice()
    {
        return $this->hasMany(Rdct_invoice::class);
    }
}
