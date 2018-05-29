<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    /**
     * Get the product that owns the OrderProduct.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * Get the order that owns the OrderProduct.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
