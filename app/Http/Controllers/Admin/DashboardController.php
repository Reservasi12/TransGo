<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\TransportService;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        // Total reservations today
        $totalReservationsToday = Reservation::whereDate('reservation_date', Carbon::today())
                                             ->count();

        // Pending cancellations
        $pendingCancellations = Reservation::whereHas('cancellation', function($query) {
            $query->where('status', 'pending');
        })->count();

        // Total revenue estimation for today
        $totalRevenueToday = Reservation::whereDate('reservation_date', Carbon::today())
                                        ->where('payment_status', 'paid')
                                        ->sum('total_price');

        // Recent reservations
        $recentReservations = Reservation::with(['user', 'transportService'])
                                         ->orderBy('created_at', 'desc')
                                         ->limit(5)
                                         ->get();

        // Total users
        $totalUsers = User::count();

        // Active transport services
        $activeTransportServices = TransportService::where('is_active', true)->count();

        return view('admin.dashboard', compact(
            'totalReservationsToday',
            'pendingCancellations',
            'totalRevenueToday',
            'recentReservations',
            'totalUsers',
            'activeTransportServices'
        ));
    }
}
