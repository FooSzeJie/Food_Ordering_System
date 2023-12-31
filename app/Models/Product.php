<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'variant', 'addOns', 'image', 'status', 'categoryID'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function addons()
    {
        return $this->belongsToMany(AddOn::class, 'product_addon', 'product_id', 'addon_id');
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'product_variant', 'product_id', 'variant_id');
    }

    // Product model
// public function variants()
// {
//     return $this->belongsToMany(Variant::class, 'product_variant');
// }

// public function addons()
// {
//     return $this->belongsToMany(Addon::class, 'product_addon');
// }


    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }
}
