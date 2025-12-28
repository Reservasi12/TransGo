<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    /**
     * Process payment using a dummy payment gateway.
     *
     * @param \App\Models\Reservation $reservation
     * @param string $paymentMethod
     * @param array $paymentData
     * @return array
     */
    public function processPayment($reservation, $paymentMethod, $paymentData = [])
    {
        // In a real application, you would integrate with actual payment gateways
        // like Midtrans, Stripe, etc. This is a simplified implementation.

        switch ($paymentMethod) {
            case 'bank_transfer':
                return $this->processBankTransfer($reservation, $paymentData);
            case 'e_wallet':
                return $this->processEWallet($reservation, $paymentData);
            case 'credit_card':
                return $this->processCreditCard($reservation, $paymentData);
            default:
                throw new \Exception('Invalid payment method');
        }
    }

    /**
     * Process bank transfer payment.
     *
     * @param \App\Models\Reservation $reservation
     * @param array $paymentData
     * @return array
     */
    private function processBankTransfer($reservation, $paymentData)
    {
        // Simulate bank transfer processing
        $paymentDetails = [
            'method' => 'bank_transfer',
            'status' => 'success',
            'transaction_id' => 'BT' . strtoupper(substr(md5(uniqid()), 0, 16)),
            'amount' => $reservation->total_price,
            'account_number' => '1234567890', // Dummy account number
            'account_name' => 'TransGo Payment',
            'bank' => $paymentData['bank'] ?? 'BCA',
            'payment_due' => now()->addDay()->format('Y-m-d H:i:s'),
        ];

        return $paymentDetails;
    }

    /**
     * Process e-wallet payment.
     *
     * @param \App\Models\Reservation $reservation
     * @param array $paymentData
     * @return array
     */
    private function processEWallet($reservation, $paymentData)
    {
        // Simulate e-wallet processing
        $paymentDetails = [
            'method' => 'e_wallet',
            'status' => 'success',
            'transaction_id' => 'EW' . strtoupper(substr(md5(uniqid()), 0, 16)),
            'amount' => $reservation->total_price,
            'wallet_provider' => $paymentData['provider'] ?? 'OVO',
            'phone_number' => $paymentData['phone'] ?? $reservation->passenger_phone,
        ];

        return $paymentDetails;
    }

    /**
     * Process credit card payment.
     *
     * @param \App\Models\Reservation $reservation
     * @param array $paymentData
     * @return array
     */
    private function processCreditCard($reservation, $paymentData)
    {
        // Simulate credit card processing
        $paymentDetails = [
            'method' => 'credit_card',
            'status' => 'success',
            'transaction_id' => 'CC' . strtoupper(substr(md5(uniqid()), 0, 16)),
            'amount' => $reservation->total_price,
            'masked_card' => '4811-11XX-XXXX-1234', // Masked card number
            'card_type' => 'VISA',
            'bank' => 'Dummy Bank',
        ];

        return $paymentDetails;
    }

    /**
     * Verify payment status.
     *
     * @param string $transactionId
     * @param string $paymentMethod
     * @return array
     */
    public function verifyPayment($transactionId, $paymentMethod)
    {
        // In a real application, this would call the payment gateway API
        // to verify the payment status

        return [
            'transaction_id' => $transactionId,
            'status' => 'paid', // Always return paid for demo purposes
            'verified_at' => now(),
        ];
    }

    /**
     * Process refund for a reservation.
     *
     * @param \App\Models\Reservation $reservation
     * @param float $amount
     * @return array
     */
    public function processRefund($reservation, $amount)
    {
        // In a real application, this would call the payment gateway API
        // to process the actual refund

        $refundDetails = [
            'reservation_id' => $reservation->id,
            'booking_code' => $reservation->booking_code,
            'amount' => $amount,
            'refund_id' => 'RF' . strtoupper(substr(md5(uniqid()), 0, 16)),
            'status' => 'success',
            'processed_at' => now(),
        ];

        return $refundDetails;
    }

    /**
     * Generate payment instructions based on method.
     *
     * @param string $paymentMethod
     * @param array $paymentDetails
     * @return string
     */
    public function generatePaymentInstructions($paymentMethod, $paymentDetails)
    {
        switch ($paymentMethod) {
            case 'bank_transfer':
                return "Please transfer Rp. " . number_format($paymentDetails['amount']) .
                       " to account number " . $paymentDetails['account_number'] .
                       " ({$paymentDetails['bank']}) a.n. {$paymentDetails['account_name']} " .
                       "before {$paymentDetails['payment_due']}";
            case 'e_wallet':
                return "Please pay Rp. " . number_format($paymentDetails['amount']) .
                       " using {$paymentDetails['wallet_provider']} with phone number " .
                       $paymentDetails['phone_number'];
            case 'credit_card':
                return "Your credit card has been charged Rp. " . number_format($paymentDetails['amount']);
            default:
                return "Please follow the payment instructions provided.";
        }
    }
}
