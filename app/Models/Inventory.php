<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'detail',
        'quantity_in',
        'price_in',
        'total_in',
        'quantity_out',
        'price_out',
        'total_out',
        'quantity_balance',
        'price_balance',
        'total_balance',
        'product_id',
        'warehouse_id',
        'inventoryable_id',
        'inventoryable_type',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function inventoryable()
    {
        return $this->morphTo();
    }
}
