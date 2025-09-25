<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'vourcher_type',
        'serie',
        'correlative',
        'date',
        'purchase_order_id',
        'suplier_id',
        'warehouse_id',
        'total',
        'observation',
    ];
}
