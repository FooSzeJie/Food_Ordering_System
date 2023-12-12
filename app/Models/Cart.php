<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'image',
        'variants',
        'addons',
        'product_description',
        'product_quantity',
        'total_price',
    ];

    protected $casts = [
        'variants' => 'array',
        'addons' => 'array',
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
