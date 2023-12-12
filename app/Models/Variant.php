<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variant', 'variant_id', 'product_id');
    }

    public function carts()
    {
        return $this->belongsTo(Cart::class, 'variants', 'id');
    }
}
