<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{

    /**
     * Get the distributors for the zone.
     */
    public function distributors()
    {
        return $this->hasMany(Distributor::class);
    }
    /**
     * Get the comments for the blog post.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
