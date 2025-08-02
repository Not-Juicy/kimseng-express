<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'destination',
        'service_type',
        'pickup_date',
        'pickup_time',
        'pickup_address',
        'delivery_address',
        'description',
        'weight',
        'status',
        'price'
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'pickup_time' => 'datetime',
        'weight' => 'decimal:2',
        'price' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
