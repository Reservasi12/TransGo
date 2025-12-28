<?php

namespace App\Services;

use App\Models\Cancellation;
use App\Models\Reservation;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class CancellationService
{
    /**
     * Create a new cancellation request.
     *
     * @param array $data
     * @param \App\Models\User $user
     * @return \App\Models\Cancellation
     */
    public function createCancellationRequest(array $data, $user)
    {
        $reservation = Reservation::where('id', $data['reservation_id'])
                                 ->where('user_id', $user->id)
                                 ->firstOrFail();

        // Check if reservation is already cancelled
        if ($reservation->booking_status === 'cancelled') {
            throw new \Exception('Reservation is already cancelled.');
        }

        // Check if reservation date has passed
        if ($reservation->reservation_date->lt(now()->startOfDay())) {
            throw new \Exception('Cannot cancel reservation for a past date.');
        }

        // Create cancellation request
        $cancellation = Cancellation::create([
            'reservation_id' => $data['reservation_id'],
            'reason' => $data['reason'],
            'status' => 'pending',
        ]);

        // Update reservation status to cancelled (will be updated again when approved/rejected)
        $reservation->update([
            'booking_status' => 'cancelled',
        ]);

        // Log activity
        ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'cancellation_request_created',
            'description' => "User requested cancellation for reservation {$reservation->booking_code}",
            'model_type' => 'Reservation',
            'model_id' => $reservation->id,
        ]);

        return $cancellation;
    }

    /**
     * Approve a cancellation request.
     *
     * @param \App\Models\Cancellation $cancellation
     * @param \App\Models\User $adminUser
     * @param string|null $adminNotes
     * @return \App\Models\Cancellation
     */
    public function approveCancellation($cancellation, $adminUser, $adminNotes = null)
    {
        if ($cancellation->status !== 'pending') {
            throw new \Exception('Cancellation request is not in pending status.');
        }

        // Calculate refund amount (for demo, refund full amount)
        $refundAmount = $cancellation->reservation->total_price;

        // Update cancellation status
        $cancellation->update([
            'status' => 'approved',
            'refund_amount' => $refundAmount,
            'admin_notes' => $adminNotes,
            'processed_by' => $adminUser->id,
            'processed_at' => now(),
        ]);

        // Update reservation status
        $cancellation->reservation->update([
            'booking_status' => 'cancelled',
            'payment_status' => 'refunded',
        ]);

        // Log activity
        ActivityLog::create([
            'user_id' => $adminUser->id,
            'action' => 'cancellation_request_approved',
            'description' => "Admin approved cancellation request for reservation {$cancellation->reservation->booking_code}",
            'model_type' => 'Cancellation',
            'model_id' => $cancellation->id,
        ]);

        return $cancellation;
    }

    /**
     * Reject a cancellation request.
     *
     * @param \App\Models\Cancellation $cancellation
     * @param \App\Models\User $adminUser
     * @param string|null $adminNotes
     * @return \App\Models\Cancellation
     */
    public function rejectCancellation($cancellation, $adminUser, $adminNotes = null)
    {
        if ($cancellation->status !== 'pending') {
            throw new \Exception('Cancellation request is not in pending status.');
        }

        // Update cancellation status
        $cancellation->update([
            'status' => 'rejected',
            'admin_notes' => $adminNotes,
            'processed_by' => $adminUser->id,
            'processed_at' => now(),
        ]);

        // Reset reservation status to confirmed (as it was before cancellation)
        $cancellation->reservation->update([
            'booking_status' => 'confirmed',
        ]);

        // Log activity
        ActivityLog::create([
            'user_id' => $adminUser->id,
            'action' => 'cancellation_request_rejected',
            'description' => "Admin rejected cancellation request for reservation {$cancellation->reservation->booking_code}",
            'model_type' => 'Cancellation',
            'model_id' => $cancellation->id,
        ]);

        return $cancellation;
    }

    /**
     * Get cancellation statistics.
     *
     * @return array
     */
    public function getCancellationStats()
    {
        $total = Cancellation::count();
        $pending = Cancellation::where('status', 'pending')->count();
        $approved = Cancellation::where('status', 'approved')->count();
        $rejected = Cancellation::where('status', 'rejected')->count();

        return [
            'total' => $total,
            'pending' => $pending,
            'approved' => $approved,
            'rejected' => $rejected,
        ];
    }

    /**
     * Get cancellation reasons breakdown.
     *
     * @return array
     */
    public function getCancellationReasonsBreakdown()
    {
        return Cancellation::selectRaw('reason, count(*) as count')
                          ->groupBy('reason')
                          ->orderBy('count', 'desc')
                          ->get();
    }
}
