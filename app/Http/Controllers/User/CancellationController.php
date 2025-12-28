<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Cancellation;
use App\Http\Requests\CancellationRequest;
use Illuminate\Support\Facades\Auth;

class CancellationController extends Controller
{
    /**
     * Display a listing of the cancellations.
     */
    public function index()
    {
        $cancellations = Auth::user()->reservations()
                                   ->whereHas('cancellation')
                                   ->with('cancellation')
                                   ->orderBy('created_at', 'desc')
                                   ->get();

        return view('user.cancellation.index', compact('cancellations'));
    }

    /**
     * Show the form for creating a new cancellation request.
     */
    public function create()
    {
        $reservations = Auth::user()->reservations()
                                   ->whereNotIn('booking_status', ['cancelled', 'completed'])
                                   ->get();

        return view('user.cancellation.create', compact('reservations'));
    }

    /**
     * Store a newly created cancellation request in storage.
     */
    public function store(CancellationRequest $request)
    {
        $validated = $request->validated();

        $reservation = Reservation::where('id', $validated['reservation_id'])
                                  ->where('user_id', Auth::id())
                                  ->first();

        if (!$reservation) {
            return redirect()->back()->with('error', 'Reservation not found.');
        }

        // Check if reservation is already cancelled
        if ($reservation->booking_status === 'cancelled') {
            return redirect()->back()->with('error', 'Reservation is already cancelled.');
        }

        // Create cancellation request
        Cancellation::create([
            'reservation_id' => $validated['reservation_id'],
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        // Update reservation status
        $reservation->update([
            'booking_status' => 'cancelled',
        ]);

        return redirect()->route('user.cancellations.index')
                         ->with('success', 'Cancellation request submitted successfully!');
    }
}
