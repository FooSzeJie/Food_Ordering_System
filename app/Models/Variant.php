<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
