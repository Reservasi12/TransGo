<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\TransportService;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReservationService
{
    /**
     * Create a new reservation.
     *
     * @param array $data
     * @param \App\Models\User $user
     * @return \App\Models\Reservation
     */
    public function createReservation(array $data, $user)
    {
        // Generate unique booking code
        $bookingCode = $this->generateBookingCode();

        // Calculate total price based on service price and passenger count
        $transportService = TransportService::findOrFail($data['service_id']);
        $totalPrice = $transportService->price * $data['passenger_count'];

        // Prepare reservation data
        $reservationData = [
            'booking_code' => $bookingCode,
            'user_id' => $user->id,
            'service_id' => $data['service_id'],
            'reservation_date' => $data['reservation_date'],
            'passenger_count' => $data['passenger_count'],
            'passenger_name' => $data['passenger_name'],
            'passenger_phone' => $data['passenger_phone'],
            'passenger_email' => $data['passenger_email'],
            'seat_numbers' => json_encode($data['seat_numbers'] ?? []),
            'total_price' => $totalPrice,
            'payment_status' => 'pending',
            'booking_status' => 'pending',
            'notes' => $data['notes'] ?? null,
        ];

        return Reservation::create($reservationData);
    }

    /**
     * Generate a unique booking code.
     *
     * @return string
     */
    public function generateBookingCode()
    {
        do {
            $bookingCode = 'TG' . strtoupper(Str::random(8));
        } while (Reservation::where('booking_code', $bookingCode)->exists());

        return $bookingCode;
    }

    /**
     * Check if a seat is available for a transport service on a specific date.
     *
     * @param int $serviceId
     * @param string $seatNumber
     * @param string $date
     * @return bool
     */
    public function isSeatAvailable($serviceId, $seatNumber, $date)
    {
        $reservations = Reservation::where('service_id', $serviceId)
                                  ->where('reservation_date', $date)
                                  ->whereIn('booking_status', ['pending', 'confirmed', 'checked_in'])
                                  ->get();

        foreach ($reservations as $reservation) {
            $seats = json_decode($reservation->seat_numbers, true);
            if (is_array($seats) && in_array($seatNumber, $seats)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get available seats for a transport service on a specific date.
     *
     * @param int $serviceId
     * @param string $date
     * @return array
     */
    public function getAvailableSeats($serviceId, $date)
    {
        $transportService = TransportService::findOrFail($serviceId);

        // Get all reserved seats for this service and date
        $reservedSeats = Reservation::where('service_id', $serviceId)
                                   ->where('reservation_date', $date)
                                   ->whereIn('booking_status', ['pending', 'confirmed', 'checked_in'])
                                   ->get()
                                   ->pluck('seat_numbers')
                                   ->flatten()
                                   ->toArray();

        // Generate all possible seats (simple approach - you can enhance this)
        $allSeats = [];
        $rows = range('A', 'Z');
        for ($i = 1; $i <= $transportService->capacity; $i++) {
            $row = $rows[floor(($i - 1) / 4)];
            $seatNumber = $row . $i;
            $allSeats[] = $seatNumber;
        }

        // Return available seats
        return array_diff($allSeats, $reservedSeats);
    }

    /**
     * Update reservation status.
     *
     * @param \App\Models\Reservation $reservation
     * @param string $status
     * @return \App\Models\Reservation
     */
    public function updateReservationStatus($reservation, $status)
    {
        $reservation->update(['booking_status' => $status]);
        return $reservation;
    }

    /**
     * Process payment for a reservation.
     *
     * @param \App\Models\Reservation $reservation
     * @param string $paymentMethod
     * @param string|null $paymentProof
     * @return \App\Models\Reservation
     */
    public function processPayment($reservation, $paymentMethod, $paymentProof = null)
    {
        $reservation->update([
            'payment_status' => 'paid',
            'payment_method' => $paymentMethod,
            'payment_proof' => $paymentProof,
            'booking_status' => 'confirmed',
        ]);

        return $reservation;
    }

    /**
     * Process check-in for a reservation.
     *
     * @param \App\Models\Reservation $reservation
     * @return \App\Models\Reservation
     */
    public function processCheckIn($reservation)
    {
        if ($reservation->booking_status === 'checked_in') {
            throw new \Exception('Reservation already checked in.');
        }

        if ($reservation->reservation_date->format('Y-m-d') !== Carbon::today()->format('Y-m-d')) {
            throw new \Exception('Check-in is only allowed on the reservation date.');
        }

        $reservation->update([
            'booking_status' => 'checked_in',
            'checked_in_at' => now(),
        ]);

        return $reservation;
    }
}
