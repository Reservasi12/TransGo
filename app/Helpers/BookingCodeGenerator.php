<?php

namespace App\Helpers;

use App\Models\Reservation;
use Illuminate\Support\Str;

class BookingCodeGenerator
{
    /**
     * Generate a unique booking code.
     *
     * @return string
     */
    public static function generate(): string
    {
        do {
            $bookingCode = 'TG' . strtoupper(Str::random(8));
        } while (Reservation::where('booking_code', $bookingCode)->exists());

        return $bookingCode;
    }

    /**
     * Validate a booking code format.
     *
     * @param string $bookingCode
     * @return bool
     */
    public static function isValid(string $bookingCode): bool
    {
        // Check if booking code matches the expected format (TG + 8 characters)
        return preg_match('/^TG[A-Z0-9]{8}$/', $bookingCode) === 1;
    }

    /**
     * Generate multiple booking codes at once.
     *
     * @param int $count
     * @return array
     */
    public static function generateMultiple(int $count): array
    {
        $codes = [];

        for ($i = 0; $i < $count; $i++) {
            $codes[] = self::generate();
        }

        return $codes;
    }
}
