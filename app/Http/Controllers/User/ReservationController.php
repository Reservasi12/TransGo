<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\TransportService;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the reservations.
     */
    public function index()
    {
        $reservations = Auth::user()->reservations()->orderBy('created_at', 'desc')->get();

        return view('user.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new reservation.
     */
    public function create()
    {
        $transportServices = TransportService::where('is_active', true)->get();

        return view('user.reservation.create', compact('transportServices'));
    }

    /**
     * Store a newly created reservation in storage.
     */
    public function store(ReservationRequest $request)
    {
        $validated = $request->validated();

        // Generate unique booking code
        $bookingCode = $this->generateBookingCode();

        $reservation = Auth::user()->reservations()->create([
            'booking_code' => $bookingCode,
            'service_id' => $validated['service_id'],
            'reservation_date' => $validated['reservation_date'],
            'passenger_count' => $validated['passenger_count'],
            'passenger_name' => $validated['passenger_name'],
            'passenger_phone' => $validated['passenger_phone'],
            'passenger_email' => $validated['passenger_email'],
            'seat_numbers' => json_encode($validated['seat_numbers'] ?? []),
            'total_price' => $validated['total_price'],
            'payment_status' => 'pending',
            'booking_status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('user.reservations.show', $reservation->id)
                         ->with('success', 'Reservation created successfully!');
    }

    /**
     * Display the specified reservation.
     */
    public function show(Reservation $reservation)
    {
        // Ensure the user can only view their own reservations
        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        return view('user.reservation.show', compact('reservation'));
    }

    /**
     * Generate unique booking code.
     */
    private function generateBookingCode()
    {
        do {
            $bookingCode = 'TG' . strtoupper(Str::random(8));
        } while (Reservation::where('booking_code', $bookingCode)->exists());

        return $bookingCode;
    }
}
