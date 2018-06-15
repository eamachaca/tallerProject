<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Product __belongs_to__ TypeProduct
    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot(['quantity','partial_price']);
    }
}
