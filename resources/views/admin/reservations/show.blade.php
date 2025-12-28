@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Reservation Details
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li><a class="font-medium" href="{{ route('admin.reservations.index') }}">Reservations /</a></li>
            <li class="font-medium text-blue-600">Details</li>
        </ol>
    </nav>
</div>

<div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
    <!-- Customer & Service Details -->
    <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Informasi Pelanggan
                </h3>
            </div>
            <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Nama</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ $reservation->user->name }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Email</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ $reservation->user->email }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Phone</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ $reservation->user->phone ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
             <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Details Layanan
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

                
                <div class="mt-6 border-t border-stroke pt-4 dark:border-slate-700">
                    <h4 class="mb-3 font-semibold text-black dark:text-white">Ketersediaan Layanan ({{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }})</h4>
                    
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Kapasitas Layanan:</span>
                            <span class="font-medium text-black dark:text-white">{{ $serviceCapacity }} Seats</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Sudah Dipesan (Disetujui):</span>
                            <span class="font-medium text-black dark:text-white">{{ $bookedSeats }} Seats</span>
                        </div>
                         <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Kursi Tersisa:</span>
                            <span class="font-medium text-blue-600">{{ $remainingSeats }} Seats</span>
                        </div>
                        <div class="flex justify-between text-sm border-t border-dashed border-gray-300 pt-2 mt-1">
                            <span class="text-gray-600 dark:text-gray-400">Dipesan oleh User:</span>
                            <span class="font-bold text-black dark:text-white">{{ $reservation->passenger_count }} Passenger(s)</span>
                        </div>
                    </div>

                    @if($isOverCapacity && $reservation->booking_status == 'pending')
                         <div class="mt-4 rounded-md bg-red-50 p-4 text-sm text-red-500 border border-red-200">
                            <strong>⚠️ Overcapacity Warning:</strong><br>
                            Approving this reservation will exceed the service capacity! Only {{ $remainingSeats }} seats remaining.
                        </div>
                    @elseif($reservation->booking_status == 'pending')
                         <div class="mt-4 rounded-md bg-green-50 p-4 text-sm text-green-500 border border-green-200">
                            <strong>✅ Quota Available:</strong><br>
                            Sufficient seats available for this reservation.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Details -->
    <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
             <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Booking Information
                </h3>
            </div>
             <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">ID Reservasi</label>
                    <p class="text-gray-600 dark:text-gray-400">#{{ $reservation->id }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Tanggal Reservasi</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('l, d F Y') }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Total Harga</label>
                    <p class="text-xl font-bold text-blue-600">Rp {{ number_format($reservation->total_price, 0, ',', '.') }}</p>
                </div>
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Status</label>
                     <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            $reservation->booking_status === 'confirmed' ? 'bg-green-100 text-green-700' : 
                            ($reservation->booking_status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                            ($reservation->booking_status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700')) 
                        }}">
                            {{ ucfirst($reservation->booking_status) }}
                        </span>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Status Pembayaran</label>
                     <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            $reservation->payment_status === 'paid' ? 'bg-green-100 text-green-700' : 
                            ($reservation->payment_status === 'refunded' ? 'bg-gray-100 text-gray-700' : 'bg-yellow-100 text-yellow-700') 
                        }}">
                            {{ ucfirst($reservation->payment_status) }}
                        </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Actions -->
    <div class="col-span-1 sm:col-span-2">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Admin Actions
                </h3>
            </div>
            <div class="p-6.5 flex flex-wrap gap-4">
                {{-- Approve Action --}}
                @if($reservation->booking_status === 'pending')
                    <form action="{{ route('admin.reservations.update-status', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="booking_status" value="confirmed">
                        <button type="submit" class="cursor-pointer inline-flex items-center justify-center rounded-md bg-green-600 py-3 px-6 text-center font-medium text-white hover:bg-opacity-90">
                            Approve Reservation
                        </button>
                    </form>

                    <form action="{{ route('admin.reservations.update-status', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="booking_status" value="cancelled">
                        <button type="submit" class="cursor-pointer inline-flex items-center justify-center rounded-md bg-red-600 py-3 px-6 text-center font-medium text-white hover:bg-opacity-90" onsubmit="return confirm('Are you sure you want to reject this reservation?');">
                            Reject Reservation
                        </button>
                    </form>
                @endif

                {{-- Payment Action (Show for any active booking that is not paid) --}}
                @if($reservation->booking_status !== 'cancelled' && $reservation->booking_status !== 'completed' && $reservation->payment_status !== 'paid')
                     <form action="{{ route('admin.reservations.update-status', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        {{-- Keep current status if it's already approved/confirmed/checked_in, otherwise default to confirmed --}}
                        <input type="hidden" name="booking_status" value="{{ in_array($reservation->booking_status, ['pending', 'cancelled']) ? 'confirmed' : $reservation->booking_status }}">
                        <input type="hidden" name="payment_status" value="paid">
                        <button type="submit" class="cursor-pointer inline-flex items-center justify-center rounded-md bg-blue-600 py-3 px-6 text-center font-medium text-white hover:bg-opacity-90">
                            Confirm Payment
                        </button>
                    </form>
                @endif

                 {{-- Complete Action (Show for paid active bookings) --}}
                @if(in_array($reservation->booking_status, ['confirmed', 'checked_in']) && $reservation->payment_status === 'paid')
                     <form action="{{ route('admin.reservations.update-status', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="booking_status" value="completed">
                        <button type="submit" class="cursor-pointer inline-flex items-center justify-center rounded-md bg-slate-600 py-3 px-6 text-center font-medium text-white hover:bg-opacity-90">
                            Mark as Completed
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
