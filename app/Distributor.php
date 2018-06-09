<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Distributor extends Authenticatable
{
    use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];
    /**
     * Get the zone that owns the distributor.
     */
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
