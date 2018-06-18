<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FillDistributor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity', 'distributor_id', 'product_id'
    ];
}
