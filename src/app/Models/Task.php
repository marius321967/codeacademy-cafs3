<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'deadline', 'priority', 'is_completed'];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function scopeCompleted(Builder $query): void
    {
        $query->where('is_completed', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
