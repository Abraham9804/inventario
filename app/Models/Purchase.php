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

    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')
                    ->withPivot('quantity', 'price', 'subtotal')
                    ->withTimestamps();
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }
}
