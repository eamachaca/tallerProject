<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The products that belong to the Order.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
