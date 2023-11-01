<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price",
        "variant",
        "addOns",
        "image",
        "status",
        "categoryID",
    ];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

}
