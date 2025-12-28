<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationManagementController extends Controller
{
    /**
     * Display a listing of the reservations.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'transportService'])
                                  ->orderBy('created_at', 'desc')
                                  ->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Display the specified reservation.
     */
    public function show(Reservation $reservation)
    {
        $reservation->load(['user', 'transportService', 'cancellation']);

        // Calculate occupied seats for this service on this date (excluding current reservation)
        $bookedSeats = Reservation::where('service_id', $reservation->service_id)
            ->where('reservation_date', $reservation->reservation_date)
            ->where('id', '!=', $reservation->id)
            ->whereIn('booking_status', ['confirmed', 'completed', 'checked_in'])
            ->sum('passenger_count');

        $serviceCapacity = $reservation->transportService->capacity;
        $remainingSeats = $serviceCapacity - $bookedSeats;
        
        $isOverCapacity = ($remainingSeats < $reservation->passenger_count);

        return view('admin.reservations.show', compact('reservation', 'bookedSeats', 'serviceCapacity', 'remainingSeats', 'isOverCapacity'));
    }
    /**
     * Update the status of the reservation.
     */
    public function updateStatus(Request $request, Reservation $reservation)
    {
        $request->validate([
            'booking_status' => 'required|in:confirmed,cancelled,completed,checked_in',
            'payment_status' => 'nullable|in:paid,unpaid,refunded'
        ]);

        $reservation->booking_status = $request->booking_status;
        
        if ($request->has('payment_status')) {
            $reservation->payment_status = $request->payment_status;
        }

        $reservation->save();

        return redirect()->route('admin.reservations.show', $reservation->id)
                         ->with('success', 'Reservation status updated successfully!');
    }
}
