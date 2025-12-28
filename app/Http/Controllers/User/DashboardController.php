<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

use App\Models\TransportService;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Get available transport services
        $transportServices = TransportService::all();

        // Get active reservations for the user
        $activeReservations = $user->reservations()
            ->whereIn('booking_status', ['pending', 'confirmed', 'checked_in'])
            ->orderBy('reservation_date', 'asc')
            ->limit(5)
            ->get();

        // Get reservation history
        $reservationHistory = $user->reservations()
            ->whereIn('booking_status', ['completed', 'cancelled'])
            ->orderBy('reservation_date', 'desc')
            ->limit(5)
            ->get();

        // Get pending cancellations
        $pendingCancellations = $user->reservations()
            ->whereHas('cancellation', function($query) {
                $query->where('status', 'pending');
            })
            ->with('cancellation')
            ->get();

        return view('user.dashboard', compact(
            'activeReservations',
            'reservationHistory',
            'pendingCancellations',
            'transportServices'
        ));
    }
}
