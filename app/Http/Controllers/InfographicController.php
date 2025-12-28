<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\TransportService;
use Carbon\Carbon;

class InfographicController extends Controller
{
    /**
     * Display the infographic page with statistics.
     */
    public function index()
    {
        // Get reservations data for the last 12 months
        $reservationsData = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $count = Reservation::whereYear('reservation_date', $month->year)
                               ->whereMonth('reservation_date', $month->month)
                               ->count();

            $reservationsData[] = [
                'month' => $month->format('M Y'),
                'count' => $count,
            ];
        }

        // Get transport service types distribution
        $transportTypes = TransportService::selectRaw('type, count(*) as count')
                                         ->groupBy('type')
                                         ->get();

        // Get total reservations by status
        $reservationsByStatus = Reservation::selectRaw('booking_status, count(*) as count')
                                          ->groupBy('booking_status')
                                          ->get();

        return view('infographic.index', compact(
            'reservationsData',
            'transportTypes',
            'reservationsByStatus'
        ));
    }
}
