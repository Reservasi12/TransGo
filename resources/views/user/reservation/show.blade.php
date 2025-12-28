@extends('layouts.user')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Detail Reservasi
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium text-black dark:text-white" href="{{ route('user.dashboard') }}">Dashboard /</a></li>
            <li><a class="font-medium text-black dark:text-white" href="{{ route('user.reservations.index') }}">Reservations /</a></li>
            <li class="font-medium text-blue-600">{{ $reservation->booking_code }}</li>
        </ol>
    </nav>
</div>

<div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
    <!-- Booking Information -->
    <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Informasi Booking
                </h3>
            </div>
            <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Booking Code</label>
                    <p class="text-xl font-bold text-blue-600">{{ $reservation->booking_code }}</p>
                </div>
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Tanggal Reservasi</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('l, d F Y') }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Status</label>
                     <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            in_array($reservation->booking_status, ['confirmed', 'checked_in']) ? 'bg-green-100 text-green-700' : 
                            ($reservation->booking_status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                            ($reservation->booking_status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700')) 
                        }}">
                            {{ ucfirst(str_replace('_', ' ', $reservation->booking_status)) }}
                        </span>
                </div>
                <!-- Add Check-in Button if applicable (e.g., status is confirmed and date is today) -->
                @if(($reservation->booking_status === 'confirmed') && \Carbon\Carbon::parse($reservation->reservation_date)->isToday())
                    <div class="mt-6">
                         <a href="{{ route('user.checkin.index') }}" class="inline-flex items-center justify-center rounded-md bg-blue-600 py-2 px-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-6 xl:px-6">
                            Go to Check-in
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Vehicle & Payment Information -->
    <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
             <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Service & Payment
                </h3>
            </div>
             <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Nama Layanan</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ $reservation->transportService->name }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Jenis Layanan</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ $reservation->transportService->type }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Total Harga</label>
                    <p class="text-xl font-bold text-black dark:text-white">Rp {{ number_format($reservation->total_price, 0, ',', '.') }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Payment Status</label>
                     <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            $reservation->payment_status === 'paid' ? 'bg-green-100 text-green-700' : 
                            ($reservation->payment_status === 'refunded' ? 'bg-gray-100 text-gray-700' : 'bg-yellow-100 text-yellow-700') 
                        }}">
                            {{ ucfirst($reservation->payment_status) }}
                        </span>
                </div>
            </div>
        </div>
        
         @if($reservation->notes)
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                 <h3 class="font-medium text-black dark:text-white">
                    Notes
                </h3>
            </div>
            <div class="p-6.5">
                <p class="text-gray-600 dark:text-gray-400">{{ $reservation->notes }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
