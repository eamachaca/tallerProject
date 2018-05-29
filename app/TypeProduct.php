<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    // TypeProduct __has_many__ Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
