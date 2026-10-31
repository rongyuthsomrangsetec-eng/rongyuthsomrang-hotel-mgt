<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type_id',
        'price_per_night',
        'floor',
        'status',
        'description',
    ];

    /**
     * Get the room type that owns the room.
     */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    /**
     * Scope a query to search rooms.
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (blank($term)) {
            return $query;
        }

        return $query->where(function (Builder $q) use ($term) {
            $q->where('room_number', 'like', "%{$term}%")
              ->orWhere('floor', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%")
              ->orWhereHas('roomType', function (Builder $typeQuery) use ($term) {
                  $typeQuery->where('name', 'like', "%{$term}%");
              });
        });
    }

    /**
     * Scope a query to filter by room type.
     */
    public function scopeFilterByType(Builder $query, ?string $typeId): Builder
    {
        if (blank($typeId) || $typeId === 'all') {
            return $query;
        }

        return $query->where('room_type_id', $typeId);
    }

    /**
     * Scope a query to filter by status.
     */
    public function scopeFilterByStatus(Builder $query, ?string $status): Builder
    {
        if (blank($status) || $status === 'all') {
            return $query;
        }

        return $query->where('status', $status);
    }
}
