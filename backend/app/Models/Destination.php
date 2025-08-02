<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'express_price',
        'standard_price',
        'economy_price',
        'is_active'
    ];

    protected $casts = [
        'express_price' => 'decimal:2',
        'standard_price' => 'decimal:2',
        'economy_price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'destination', 'name');
    }
}
