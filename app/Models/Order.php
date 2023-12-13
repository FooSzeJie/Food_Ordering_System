<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // public function orderItems()
    // {
    //     return $this->hasMany(Order_item::class,'order_id','id');
    // }

    public function orderItems()
    {
        return $this->hasMany(Order_item::class);
    }

    public function items()
    {
        return $this->hasMany(Order_item::class, 'order_id', 'id');
    }
}
