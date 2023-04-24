<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    protected $fillable = ['name', 'email'];
    protected $hidden = ['password'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // These two methods are required for JWT guard to work
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
