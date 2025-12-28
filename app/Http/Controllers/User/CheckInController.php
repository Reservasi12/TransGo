<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\CheckInRequest;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    /**
     * Show the check-in form.
     */
    public function index()
    {
        return view('user.checkin.index');
    }

    /**
     * Process the check-in.
     */
    public function process(CheckInRequest $request)
    {
        $validated = $request->validated();

        $reservation = Reservation::where('booking_code', $validated['booking_code'])
                                  ->where('user_id', Auth::id())
                                  ->first();

        if (!$reservation) {
            return redirect()->back()->with('error', 'Reservation not found with this booking code.');
        }

        // Check if already checked in
        if ($reservation->booking_status === 'checked_in') {
            return redirect()->back()->with('error', 'You have already checked in for this reservation.');
        }

        // Ensure reservation is confirmed before check-in
        if ($reservation->booking_status !== 'confirmed') {
            return redirect()->back()->with('error', 'Reservation must be confirmed before checking in.');
        }

        // Check if reservation date is today
        if ($reservation->reservation_date->format('Y-m-d') !== now()->format('Y-m-d')) {
            return redirect()->back()->with('error', 'Check-in is only allowed on the reservation date.');
        }

        // Update reservation status and check-in time
        $reservation->update([
            'booking_status' => 'checked_in',
            'checked_in_at' => now(),
        ]);

        return redirect()->route('user.reservations.show', $reservation->id)
                         ->with('success', 'Check-in successful!');
    }
}
