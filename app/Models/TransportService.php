<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class TransportService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'name',
        'type',
        'route_from',
        'route_to',
        'departure_time',
        'arrival_time',
        'capacity',
        'price',
        'price_per_day',
        'facilities',
        'description',
        'is_active',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'price' => 'decimal:2',
            'departure_time' => 'datetime:H:i',
            'arrival_time' => 'datetime:H:i',
        ];
    }

    /**
     * Get the reservations for this transport service.
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the cancellations through reservations for this transport service.
     */
    public function cancellations(): HasManyThrough
    {
        return $this->hasManyThrough(Cancellation::class, Reservation::class);
    }
}
