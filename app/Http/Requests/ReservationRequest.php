<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow authenticated users to make reservations
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => 'required|exists:transport_services,id',
            'reservation_date' => 'required|date|after_or_equal:today',
            'passenger_count' => 'required|integer|min:1|max:10',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|string|max:20',
            'passenger_email' => 'required|email|max:255',
            'seat_numbers' => 'array|max:10',
            'seat_numbers.*' => 'string|max:10',
            'total_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'service_id.required' => 'Transport service is required.',
            'service_id.exists' => 'Selected transport service does not exist.',
            'reservation_date.required' => 'Reservation date is required.',
            'reservation_date.after_or_equal' => 'Reservation date must be today or in the future.',
            'passenger_count.required' => 'Passenger count is required.',
            'passenger_count.integer' => 'Passenger count must be a number.',
            'passenger_count.min' => 'Minimum passenger count is 1.',
            'passenger_count.max' => 'Maximum passenger count is 10.',
            'passenger_name.required' => 'Passenger name is required.',
            'passenger_phone.required' => 'Passenger phone is required.',
            'passenger_email.required' => 'Passenger email is required.',
            'passenger_email.email' => 'Please enter a valid email address.',
            'total_price.required' => 'Total price is required.',
            'total_price.numeric' => 'Total price must be a number.',
        ];
    }
}
