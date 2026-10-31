<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'base_price',
        'capacity',
        'description',
    ];

    /**
     * Get all rooms for this room type.
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }
}
