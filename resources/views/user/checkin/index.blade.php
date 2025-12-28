@extends('layouts.user')

@section('content')

<!-- Page Header -->
<div class="mb-6 sm:mb-8">
    <h1 class="text-2xl sm:text-3xl font-black text-gray-900 dark:text-white mb-2">Check-in Online</h1>
    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Lakukan check-in cepat untuk perjalanan Anda</p>
</div>

<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
    
    <!-- Check-in Form -->
    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg border-2 border-gray-100 dark:border-slate-700">
            <!-- Card Header -->
            <div class="px-6 py-5 sm:px-8 sm:py-6 border-b border-gray-200 dark:border-slate-700">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl sm:text-2xl font-black text-gray-900 dark:text-white">Verifikasi Booking</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Masukkan kode booking Anda</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('user.checkin.process') }}" method="POST" class="p-6 sm:p-8 space-y-6">
                @csrf

                <!-- Booking Code Input -->
                <div class="space-y-3">
                    <label for="booking_code" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mr-2 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                        </svg>
                        Kode Booking
                        <span class="ml-1 text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="booking_code"
                           name="booking_code" 
                           placeholder="Contoh: TGO-2024-001" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all @error('booking_code') border-red-500 @enderror"
                           value="{{ old('booking_code') }}"
                           required
                           autofocus>
                    @error('booking_code')
                        <p class="text-sm text-red-600 dark:text-red-400 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Masukkan kode booking yang ada di email konfirmasi atau detail reservasi Anda
                    </p>
                </div>

                <!-- Additional Info (Optional) -->
                <div class="space-y-3">
                    <label for="phone" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mr-2 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Nomor Telepon (Opsional)
                    </label>
                    <input type="tel" 
                           id="phone"
                           name="phone" 
                           placeholder="08xxxxxxxxxx" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all"
                           value="{{ old('phone', Auth::user()->phone) }}">
                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                        Untuk verifikasi tambahan
                    </p>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-teal-600 to-cyan-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-teal-500 hover:to-cyan-500 transform hover:scale-105 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Check-in Sekarang
                </button>

            </form>
        </div>
    </div>

    <!-- Information Sidebar -->
    <div class="lg:col-span-1 space-y-6">
        
        <!-- Important Notes -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl p-6 border-2 border-blue-200 dark:border-blue-800">
            <div class="flex items-start gap-3 mb-4">
                <div class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-xl flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-black text-blue-900 dark:text-blue-100 mb-1">Penting!</h3>
                    <p class="text-sm text-blue-700 dark:text-blue-200">Yang perlu Anda ketahui</p>
                </div>
            </div>
            
            <ul class="space-y-3 text-sm text-blue-800 dark:text-blue-200">
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Check-in hanya tersedia di tanggal keberangkatan</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Pastikan status reservasi Anda "Confirmed"</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Setelah check-in, tunjukkan konfirmasi ke driver</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Datang minimal 30 menit sebelum keberangkatan</span>
                </li>
            </ul>
        </div>

        <!-- Help Card -->
        <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 border-2 border-gray-100 dark:border-slate-700">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-black text-gray-900 dark:text-white">Butuh Bantuan?</h3>
                </div>
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                Tidak menemukan kode booking Anda?
            </p>
            <div class="space-y-3">
                <a href="{{ route('user.reservations.index') }}" 
                   class="flex items-center gap-2 text-sm font-bold text-teal-600 hover:text-teal-700 dark:text-teal-400 dark:hover:text-teal-300 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    Lihat Daftar Reservasi
                </a>
                <a href="{{ route('user.dashboard') }}" 
                   class="flex items-center gap-2 text-sm font-bold text-teal-600 hover:text-teal-700 dark:text-teal-400 dark:hover:text-teal-300 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-slate-800 dark:to-slate-700 rounded-2xl p-6 border-2 border-teal-200 dark:border-teal-800">
            <h3 class="text-lg font-black text-gray-900 dark:text-white mb-4">Reservasi Anda</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-white">Aktif</span>
                    <span class="text-lg font-black text-teal-600 dark:text-teal-400">
                        {{ Auth::user()->reservations->whereIn('booking_status', ['pending', 'confirmed'])->count() }}
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-white">Total</span>
                    <span class="text-lg font-black text-gray-900 dark:text-white">
                        {{ Auth::user()->reservations->count() }}
                    </span>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
