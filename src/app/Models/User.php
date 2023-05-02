<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    protected $fillable = ['name', 'email'];
    protected $hidden = ['password', 'avatar_filename'];
    protected $appends = ['has_avatar'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    protected function hasAvatar(): Attribute
    {
        return new Attribute(
            get: fn ($_, array $attributes) => $attributes['avatar_filename'] !== null,
        );
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
