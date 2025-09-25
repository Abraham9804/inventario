<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['identity_id','document_number','name', 'email', 'phone', 'address'];

    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
