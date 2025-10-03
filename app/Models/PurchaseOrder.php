<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'vourcher_type',
        'serie',
        'correlative',
        'date',
        'suplier_id',
        'total',
        'observation',
    ];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }
}
