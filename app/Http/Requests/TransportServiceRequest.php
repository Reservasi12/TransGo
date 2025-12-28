<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Only allow admin and staff to manage transport services
        return auth()->check() && in_array(auth()->user()->role, ['admin', 'staff']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|unique:transport_services,code,' . ($this->route('transport_service') ? $this->route('transport_service')->id : 'NULL'),
            'name' => 'required|string|max:255',
            'type' => 'required|in:bus,shuttle,travel',
            'route_from' => 'required|string|max:255',
            'route_to' => 'required|string|max:255',
            'departure_time' => 'required|date_format:H:i',
            'arrival_time' => 'required|date_format:H:i|after:departure_time',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'price_per_day' => 'nullable|numeric|min:0',
            'facilities' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'code.required' => 'Service code is required.',
            'code.unique' => 'Service code already exists.',
            'name.required' => 'Service name is required.',
            'type.required' => 'Service type is required.',
            'type.in' => 'Service type must be bus, shuttle, or travel.',
            'route_from.required' => 'Departure route is required.',
            'route_to.required' => 'Destination route is required.',
            'departure_time.required' => 'Departure time is required.',
            'departure_time.date_format' => 'Departure time must be in HH:MM format.',
            'arrival_time.required' => 'Arrival time is required.',
            'arrival_time.date_format' => 'Arrival time must be in HH:MM format.',
            'arrival_time.after' => 'Arrival time must be after departure time.',
            'capacity.required' => 'Capacity is required.',
            'capacity.integer' => 'Capacity must be a number.',
            'capacity.min' => 'Capacity must be at least 1.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price must be at least 0.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
    }
}
