<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = ['identity_id','document_number','name', 'email', 'phone', 'address'];
}
