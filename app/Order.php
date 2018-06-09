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
    /**
     * Get the post that owns the comment.
     */
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
