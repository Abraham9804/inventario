<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quotes extends Model
{
    protected $fillable = [
        'vourcher_type',
        'serie',
        'correlative',
        'date',
        'customer_id',
        'total',
        'observation',
    ];
}
