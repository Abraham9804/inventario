<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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


     //Accesors
     protected function image(): Attribute 
     {
          return Attribute::make(
               get: fn() => $this->images()->count() ? Storage::url($this->images->first()->path) : Storage::url('images/no_image.jpg')
          );
     }

     public function purchases()
     {
          return $this->morphedByMany(Purchase::class, 'productable')
                         ->withPivot('quantity', 'price', 'subtotal')
                         ->withTimestamps();
     }

     public function purchaseOrders()
     {
          return $this->morphedByMany(PurchaseOrder::class, 'productable')
                         ->withPivot('qty', 'price', 'subtotal')
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
