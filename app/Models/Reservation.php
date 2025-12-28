<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'booking_code',
        'user_id',
        'service_id',
        'reservation_date',
        'passenger_count',
        'passenger_name',
        'passenger_phone',
        'passenger_email',
        'seat_numbers',
        'total_price',
        'payment_status',
        'payment_method',
        'payment_proof',
        'booking_status',
        'checked_in_at',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'reservation_date' => 'date',
            'total_price' => 'decimal:2',
            'checked_in_at' => 'datetime',
            'seat_numbers' => 'array',
        ];
    }

    /**
     * Get the user that owns the reservation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the transport service for the reservation.
     */
    public function transportService(): BelongsTo
    {
        return $this->belongsTo(TransportService::class, 'service_id');
    }

    /**
     * Get the cancellation for this reservation.
     */
    public function cancellation(): HasOne
    {
        return $this->hasOne(Cancellation::class);
    }
}
