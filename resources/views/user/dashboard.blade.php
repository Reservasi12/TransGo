@extends('layouts.user')

@section('page-title', 'Dashboard')

@section('content')

<!-- Welcome Banner -->
<div class="mb-6 sm:mb-8 rounded-xl sm:rounded-2xl bg-gradient-to-r from-teal-600 via-cyan-600 to-blue-600 p-6 sm:p-8 text-white shadow-xl">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-teal-100 text-sm sm:text-base lg:text-lg">Kelola reservasi dan perjalanan Anda dengan mudah</p>
        </div>
        <div class="hidden md:flex items-center justify-center w-16 h-16 lg:w-20 lg:h-20 bg-white/20 backdrop-blur-sm rounded-xl sm:rounded-2xl">
            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0  011 .894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
            </svg>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
    
    <!-- Active Reservations Card -->
    <div class="bg-white dark:bg-slate-800 rounded-xl sm:rounded-2xl shadow-lg border-2 border-gray-100 dark:border-slate-700 overflow-hidden group hover:shadow-xl transition-all duration-300">
        <div class="p-5 sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-2xl shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                @if($activeReservations->count() > 0)
                    <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-black rounded-full uppercase">Active</span>
                @endif
            </div>
            <h3 class="text-3xl sm:text-4xl font-black text-gray-900 dark:text-white mb-2">{{ $activeReservations->count() }}</h3>
            <p class="text-xs sm:text-sm font-bold text-gray-500 dark:text-gray-400 mb-3 sm:mb-4">Reservasi Aktif</p>
            <a href="{{ route('user.reservations.index') }}" class="inline-flex items-center text-sm font-bold text-teal-600 dark:text-teal-400 hover:text-teal-700 dark:hover:text-teal-300 group-hover:gap-2 gap-1 transition-all">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- History Card -->
    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg border-2 border-gray-100 dark:border-slate-700 overflow-hidden group hover:shadow-xl transition-all duration-300">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-2">{{ Auth::user()->reservations()->count() }}</h3>
            <p class="text-sm font-bold text-gray-500 dark:text-gray-400 mb-4">Total Perjalanan</p>
            <a href="{{ route('user.reservations.index') }}" class="inline-flex items-center text-sm font-bold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 group-hover:gap-2 gap-1 transition-all">
                Riwayat
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    <!--  Pending Cancellations Card -->
    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg border-2 border-gray-100 dark:border-slate-700 overflow-hidden group hover:shadow-xl transition-all duration-300">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                @if($pendingCancellations->count() > 0)
                    <span class="px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 text-xs font-black rounded-full uppercase">Pending</span>
                @endif
            </div>
            <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-2">{{ $pendingCancellations->count() }}</h3>
            <p class="text-sm font-bold text-gray-500 dark:text-gray-400 mb-4">Pengajuan Pembatalan</p>
            <a href="{{ route('user.cancellations.index') }}" class="inline-flex items-center text-sm font-bold text-amber-600 dark:text-amber-400 hover:text-amber-700 dark:hover:text-amber-300 group-hover:gap-2 gap-1 transition-all">
                Detail
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

</div>

<!-- Available Services -->
<div class="mb-6 sm:mb-8">
    <div class="flex items-center justify-between mb-4 sm:mb-6">
        <h2 class="text-xl sm:text-2xl font-black text-gray-900 dark:text-white">Layanan Tersedia</h2>
        <a href="{{ route('user.reservations.create') }}" class="text-sm font-bold text-teal-600 dark:text-teal-400 hover:text-teal-700 dark:hover:text-teal-300">
            Lihat Semua
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($transportServices as $service)
        <div class="group bg-white dark:bg-slate-800 rounded-2xl shadow-lg border-2 border-gray-100 dark:border-slate-700 overflow-hidden hover:border-teal-200 dark:hover:border-slate-600 transition-all duration-300">
            <!-- Image Container -->
            <div class="relative h-48 overflow-hidden">
                <img src="{{ $service->image ? Storage::url($service->image) : 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=800' }}" 
                     alt="{{ $service->name }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                
                <!-- Type Badge -->
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 bg-white text-teal-800 text-xs font-black rounded-full uppercase shadow-md">
                        {{ $service->type }}
                    </span>
                </div>

                <!-- Price Badge -->
                <div class="absolute bottom-4 right-4">
                    <span class="px-4 py-2 bg-orange-500 text-white text-sm font-black rounded-full shadow-lg">
                        Rp {{ number_format($service->price, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2 line-clamp-1" title="{{ $service->name }}">
                    {{ $service->name }}
                </h3>
                
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2 min-h-[40px]">
                    {{ $service->description ?? 'Layanan transportasi nyaman dan aman untuk perjalanan Anda.' }}
                </p>

                <!-- Meta Info -->
                <div class="flex items-center gap-4 mb-6 text-sm text-gray-500 dark:text-gray-400">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        <span class="font-bold">{{ $service->capacity }} kursi</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-5 h-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-bold truncate">{{ $service->route_from }} - {{ $service->route_to }}</span>
                    </div>
                </div>

                <!-- Action Button -->
                <a href="{{ route('user.reservations.create', ['service_id' => $service->id]) }}" 
                   class="block w-full py-3 bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-bold text-center rounded-xl shadow-md hover:shadow-lg transform active:scale-95 transition-all">
                    Pesan Sekarang
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
    
    <!-- Create Reservation Card -->
    <a href="{{ route('user.reservations.create') }}" 
       class="group bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-slate-800 dark:to-slate-700 rounded-xl sm:rounded-2xl p-6 sm:p-8 border-2 border-teal-200 dark:border-teal-800 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center gap-4 sm:gap-6">
            <div class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-gradient-to-br from-teal-600 to-cyan-600 rounded-xl sm:rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-lg sm:text-xl font-black text-gray-900 dark:text-white mb-1">Buat Reservasi Baru</h3>
                <p class="text-sm sm:text-base text-gray-600 dark:text-white font-medium">Pesan transportasi untuk perjalanan Anda</p>
            </div>
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-teal-600 dark:text-teal-400 group-hover:translate-x-1 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

    <!-- Check-in Card -->
    <a href="{{ route('user.checkin.index') }}" 
       class="group bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-slate-800 dark:to-slate-700 rounded-2xl p-8 border-2 border-blue-200 dark:border-blue-800 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center gap-6">
            <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-1">Check-in Online</h3>
                <p class="text-gray-600 dark:text-gray-400 font-medium">Lakukan check-in untuk perjalanan Anda</p>
            </div>
            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </a>

</div>

<!-- Recent Reservations -->
<div class="bg-white dark:bg-slate-800 rounded-xl sm:rounded-2xl shadow-lg border-2 border-gray-100 dark:border-slate-700">
    <div class="px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6 border-b border-gray-200 dark:border-slate-700">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0">
            <h2 class="text-xl sm:text-2xl font-black text-gray-900 dark:text-white">Reservasi Terbaru</h2>
            <a href="{{ route('user.reservations.index') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 sm:px-5 sm:py-2.5 bg-teal-100 dark:bg-teal-900/30 text-teal-700 dark:text-teal-300 rounded-xl hover:bg-teal-200 dark:hover:bg-teal-900/50 font-bold transition-colors text-sm sm:text-base">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="p-4 sm:p-6 lg:p-8">
        @if($activeReservations->count() > 0)
            <div class="space-y-3 sm:space-y-4">
                @foreach($activeReservations->take(5) as $reservation)
                <div class="flex items-center gap-6 p-5 rounded-xl border-2 border-gray-100 dark:border-slate-700" hover:border-teal-200 dark:hover:border-teal-800 transition-colors">
                    <!-- Icon -->
                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-xl flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                        </svg>
                    </div>

                    <!-- Content -->
                    <div class="flex-1 min-w-0">
                        <h3 class="text-base sm:text-lg font-black text-gray-900 dark:text-white truncate">{{ $reservation->transportService->name }}</h3>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 mt-1">
                            <span class="text-sm text-gray-500 dark:text-gray-400 font-medium">
                                {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }}
                            </span>
                            <span class="px-3 py-1 text-xs font-black rounded-full uppercase
                                {{ $reservation->booking_status === 'confirmed' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 
                                   ($reservation->booking_status === 'pending' ? 'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400' : 
                                   'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-400') }}">
                                {{ $reservation->booking_status }}
                            </span>
                        </div>
                    </div>

                    <!-- Action -->
                    <a href="{{ route('user.reservations.show', $reservation->id) }}" 
                       class="flex items-center justify-center sm:justify-start gap-2 px-4 py-2 sm:px-5 sm:py-2.5 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-teal-600 hover:text-white dark:hover:bg-teal-600 font-bold transition-all text-sm sm:text-base whitespace-nowrap">
                        Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="flex justify-center mb-4">
                    <div class="flex items-center justify-center w-20 h-20 bg-gray-100 dark:bg-slate-700 rounded-full">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-black text-gray-900 dark:text-white mb-2">Belum Ada Reservasi</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">Mulai perjalanan Anda dengan membuat reservasi pertama</p>
                <a href="{{ route('user.reservations.create') }}" 
                   class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-teal-600 to-cyan-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-teal-500 hover:to-cyan-500 transform hover:scale-105 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Buat Reservasi Sekarang
                </a>
            </div>
        @endif
    </div>
</div>

@endsection
