<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cancellation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class CancellationManagementController extends Controller
{
    /**
     * Display a listing of the cancellations.
     */
    public function index()
    {
        $cancellations = Cancellation::with(['reservation.user', 'processedBy'])
                                   ->orderBy('created_at', 'desc')
                                   ->get();

        return view('admin.cancellations.index', compact('cancellations'));
    }

    /**
     * Display the specified cancellation.
     */
    public function show(Cancellation $cancellation)
    {
        $cancellation->load(['reservation.user', 'reservation.transportService', 'processedBy']);

        return view('admin.cancellations.show', compact('cancellation'));
    }

    /**
     * Update the specified cancellation in storage.
     */
    public function update(Request $request, Cancellation $cancellation)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'admin_notes' => 'nullable|string',
            'refund_amount' => 'nullable|numeric|min:0',
        ]);

        $cancellation->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'refund_amount' => $request->refund_amount,
            'processed_by' => Auth::id(),
            'processed_at' => now(),
        ]);

        // Update reservation status based on cancellation decision
        $reservation = $cancellation->reservation;
        if ($request->status === 'approved') {
            $reservation->update([
                'booking_status' => 'cancelled',
                'payment_status' => 'refunded',
            ]);
        } elseif ($request->status === 'rejected') {
            $reservation->update([
                'booking_status' => 'confirmed', // Reset to confirmed if cancellation is rejected
            ]);
        }

        return redirect()->route('admin.cancellations.index')
                         ->with('success', 'Cancellation request updated successfully!');
    }
}
