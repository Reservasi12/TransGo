<?php

namespace App\Services;

use App\Models\User;
use App\Models\Reservation;
use App\Models\Cancellation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotificationService
{
    /**
     * Send reservation confirmation notification.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function sendReservationConfirmation($reservation)
    {
        // In a real application, you would send an email or push notification
        // For now, we'll just log the notification

        // Example: Send email to user
        $user = $reservation->user;

        $this->logNotification([
            'type' => 'reservation_confirmation',
            'recipient' => $user->email,
            'reservation_id' => $reservation->id,
            'booking_code' => $reservation->booking_code,
            'message' => "Reservation confirmed for {$reservation->booking_code}",
        ]);
    }

    /**
     * Send payment confirmation notification.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function sendPaymentConfirmation($reservation)
    {
        $user = $reservation->user;

        $this->logNotification([
            'type' => 'payment_confirmation',
            'recipient' => $user->email,
            'reservation_id' => $reservation->id,
            'booking_code' => $reservation->booking_code,
            'message' => "Payment confirmed for reservation {$reservation->booking_code}",
        ]);
    }

    /**
     * Send check-in confirmation notification.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function sendCheckInConfirmation($reservation)
    {
        $user = $reservation->user;

        $this->logNotification([
            'type' => 'checkin_confirmation',
            'recipient' => $user->email,
            'reservation_id' => $reservation->id,
            'booking_code' => $reservation->booking_code,
            'message' => "Check-in completed for reservation {$reservation->booking_code}",
        ]);
    }

    /**
     * Send cancellation request notification to admin.
     *
     * @param \App\Models\Cancellation $cancellation
     * @return void
     */
    public function sendCancellationRequestNotification($cancellation)
    {
        // Send notification to admin about new cancellation request
        $adminUsers = User::where('role', 'admin')->get();

        foreach ($adminUsers as $admin) {
            $this->logNotification([
                'type' => 'cancellation_request',
                'recipient' => $admin->email,
                'reservation_id' => $cancellation->reservation_id,
                'booking_code' => $cancellation->reservation->booking_code,
                'message' => "New cancellation request for reservation {$cancellation->reservation->booking_code}",
            ]);
        }
    }

    /**
     * Send cancellation approval notification to user.
     *
     * @param \App\Models\Cancellation $cancellation
     * @return void
     */
    public function sendCancellationApprovalNotification($cancellation)
    {
        $user = $cancellation->reservation->user;

        $this->logNotification([
            'type' => 'cancellation_approved',
            'recipient' => $user->email,
            'reservation_id' => $cancellation->reservation_id,
            'booking_code' => $cancellation->reservation->booking_code,
            'message' => "Cancellation request approved for reservation {$cancellation->reservation->booking_code}",
        ]);
    }

    /**
     * Send cancellation rejection notification to user.
     *
     * @param \App\Models\Cancellation $cancellation
     * @return void
     */
    public function sendCancellationRejectionNotification($cancellation)
    {
        $user = $cancellation->reservation->user;

        $this->logNotification([
            'type' => 'cancellation_rejected',
            'recipient' => $user->email,
            'reservation_id' => $cancellation->reservation_id,
            'booking_code' => $cancellation->reservation->booking_code,
            'message' => "Cancellation request rejected for reservation {$cancellation->reservation->booking_code}",
        ]);
    }

    /**
     * Send reminder notification before reservation date.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function sendReservationReminder($reservation)
    {
        $user = $reservation->user;

        $this->logNotification([
            'type' => 'reservation_reminder',
            'recipient' => $user->email,
            'reservation_id' => $reservation->id,
            'booking_code' => $reservation->booking_code,
            'message' => "Reminder: Your reservation {$reservation->booking_code} is scheduled for tomorrow",
        ]);
    }

    /**
     * Log notification (for demo purposes).
     *
     * @param array $notificationData
     * @return void
     */
    private function logNotification($notificationData)
    {
        // In a real application, you would send actual notifications via email, SMS, or push
        // For now, we'll just log it to the activity logs

        \App\Models\ActivityLog::create([
            'user_id' => $notificationData['recipient'] ?? null,
            'action' => $notificationData['type'],
            'description' => $notificationData['message'],
            'model_type' => 'Reservation',
            'model_id' => $notificationData['reservation_id'] ?? null,
        ]);
    }

    /**
     * Send transport service update notification to affected users.
     *
     * @param \App\Models\TransportService $transportService
     * @param string $updateType
     * @return void
     */
    public function sendTransportServiceUpdateNotification($transportService, $updateType)
    {
        // Get all reservations for this transport service that are still active
        $reservations = Reservation::where('service_id', $transportService->id)
                                 ->whereIn('booking_status', ['pending', 'confirmed'])
                                 ->get();

        foreach ($reservations as $reservation) {
            $user = $reservation->user;

            $this->logNotification([
                'type' => 'transport_service_update',
                'recipient' => $user->email,
                'reservation_id' => $reservation->id,
                'booking_code' => $reservation->booking_code,
                'message' => "Update on your transport service for reservation {$reservation->booking_code}: {$updateType}",
            ]);
        }
    }
}
