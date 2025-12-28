<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransportService;
use App\Models\Blog;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the homepage.
     */
    public function index()
    {
        $transportServices = TransportService::where('is_active', true)
                                           ->orderBy('created_at', 'desc')
                                           ->limit(6)
                                           ->get();

        $blogs = Blog::where('is_published', true)
                    ->orderBy('published_at', 'desc')
                    ->limit(3)
                    ->get();

        // Statistics data from database
        $stats = [
            'total_reservations' => Reservation::count(),
            'confirmed_reservations' => Reservation::where('booking_status', 'confirmed')->count(),
            'total_revenue' => Reservation::where('booking_status', 'confirmed')->sum('total_price'),
            // Calculate average rating (you can adjust this based on your rating system)
            'average_rating' => 4.8, // Placeholder - implement actual rating system if available
            
            // Calculate growth percentage (comparing this month to last month)
            'monthly_growth' => $this->calculateMonthlyGrowth(),
        ];

        return view('home.index', compact('transportServices', 'blogs', 'stats'));
    }

    /**
     * Calculate monthly growth percentage
     */
    private function calculateMonthlyGrowth()
    {
        $currentMonth = Reservation::whereMonth('created_at', now()->month)
                                  ->whereYear('created_at', now()->year)
                                  ->count();
        
        $lastMonth = Reservation::whereMonth('created_at', now()->subMonth()->month)
                               ->whereYear('created_at', now()->subMonth()->year)
                               ->count();

        if ($lastMonth == 0) {
            return $currentMonth > 0 ? 100 : 0;
        }

        return round((($currentMonth - $lastMonth) / $lastMonth) * 100, 1);
    }
}
