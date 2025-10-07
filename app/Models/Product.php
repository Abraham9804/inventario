<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Product extends Model
{

     use HasFactory;
     protected $fillable = [
          'name',
          'description',
          'sku',
          'barcode',
          'price',
          'category_id',
     ];

     public function purchases()
     {
          return $this->morphedByMany(Purchase::class, 'productable')
                         ->withPivot('quantity', 'price', 'subtotal')
                         ->withTimestamps();
     }

     public function sales()
     {
          return $this->morphedByMany(Sale::class, 'productable')
                         ->withPivot('quantity', 'price', 'subtotal')
                         ->withTimestamps();
     }

     public function movements()
     {
          return $this->morphedByMany(Movement::class, 'productable')
                         ->withPivot('quantity', 'price', 'subtotal')
                         ->withTimestamps();
     }

     public function transfers()
     {
          return $this->morphedByMany(Transfer::class, 'productable')
                         ->withPivot('quantity', 'price', 'subtotal')
                         ->withTimestamps();
     }

     public function quotes()
     {
               return $this->morphedByMany(Quote::class, 'productable')
                         ->withPivot('quantity', 'price', 'subtotal')
                         ->withTimestamps();
     }

     public function category()
     {
          return $this->belongsTo(Category::class);
     }

     public function inventaries()
     {
          return $this->hasMany(Inventory::class);
     }

     public function images()
     {
          return $this->morphMany(Image::class, 'imageable');
     }
}
