@extends('layouts.user')

@section('content')

<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white mb-2">Buat Reservasi Baru</h1>
            <p class="text-gray-600 dark:text-gray-400">Isi form berikut untuk membuat reservasi transportasi</p>
        </div>
        <a href="{{ route('user.reservations.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>
</div>

<!-- Reservation Form -->
<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-gray-200 dark:border-slate-700">
    <form action="{{ route('user.reservations.store') }}" method="POST" class="p-8 space-y-8">
        @csrf

        <!-- Service Selection -->
        <div>
            <h2 class="text-xl font-black text-gray-900 dark:text-white mb-6 pb-4 border-b border-gray-200 dark:border-slate-700">
                1. Pilih Layanan Transportasi
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($transportServices as $service)
                <label class="relative cursor-pointer group">
                    <input type="radio" name="service_id" value="{{ $service->id }}" 
                           class="peer sr-only" 
                           data-price="{{ $service->price }}"
                           {{ (request('service_id') == $service->id || old('service_id') == $service->id) ? 'checked' : '' }}
                           required>
                    
                    <div class="border-2 border-gray-200 dark:border-slate-700 rounded-2xl overflow-hidden transition-all peer-checked:border-teal-500 peer-checked:ring-4 peer-checked:ring-teal-500/20 hover:border-gray-300 dark:hover:border-slate-600">
                        <!-- Image -->
                        <div class="h-40 overflow-hidden bg-gray-100 dark:bg-slate-700">
                            <img src="{{ $service->image ? Storage::url($service->image) : 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400' }}" 
                                 alt="{{ $service->name }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        
                        <!-- Content -->
                        <div class="p-5 space-y-3">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="font-black text-lg text-gray-900 dark:text-white">{{ $service->name }}</h3>
                                <div class="flex-shrink-0 w-6 h-6 rounded-full border-2 border-gray-300 dark:border-slate-600 peer-checked:border-teal-500 peer-checked:bg-teal-500 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">{{ $service->description }}</p>
                            
                            <div class="flex items-center justify-between pt-2 border-t border-gray-100 dark:border-slate-700">
                                <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">{{ $service->type }}</span>
                                <span class="text-lg font-black text-teal-600 dark:text-teal-400">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </label>
                @endforeach
            </div>

            @error('service_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Reservation Details -->
        <div>
            <h2 class="text-xl font-black text-gray-900 dark:text-white mb-6 pb-4 border-b border-gray-200 dark:border-slate-700">
                2. Detail Reservasi
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Reservation Date -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            Tanggal Reservasi
                        </span>
                    </label>
                    <input type="date" name="reservation_date" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all @error('reservation_date') border-red-500 @enderror"
                           min="{{ date('Y-m-d') }}"
                           value="{{ old('reservation_date', date('Y-m-d')) }}"
                           required>
                    @error('reservation_date')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Passenger Count -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            Jumlah Penumpang
                        </span>
                    </label>
                    <input type="number" name="passenger_count" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all @error('passenger_count') border-red-500 @enderror"
                           min="1"
                           value="{{ old('passenger_count', 1) }}"
                           required>
                    @error('passenger_count')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Passenger Information -->
        <div>
            <h2 class="text-xl font-black text-gray-900 dark:text-white mb-6 pb-4 border-b border-gray-200 dark:border-slate-700">
                3. Informasi Penumpang
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Passenger Name -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        Nama Lengkap
                    </label>
                    <input type="text" name="passenger_name" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all @error('passenger_name') border-red-500 @enderror"
                           value="{{ old('passenger_name', Auth::user()->name) }}"
                           placeholder="Masukkan nama lengkap"
                           required>
                    @error('passenger_name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Passenger Phone -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        Nomor Telepon
                    </label>
                    <input type="tel" name="passenger_phone" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all @error('passenger_phone') border-red-500 @enderror"
                           value="{{ old('passenger_phone') }}"
                           placeholder="Contoh: 081234567890"
                           required>
                    @error('passenger_phone')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Passenger Email -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        Email
                    </label>
                    <input type="email" name="passenger_email" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all @error('passenger_email') border-red-500 @enderror"
                           value="{{ old('passenger_email', Auth::user()->email) }}"
                           placeholder="email@example.com"
                           required>
                    @error('passenger_email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 dark:text-white mb-3">
                        Catatan (Opsional)
                    </label>
                    <textarea name="notes" rows="4"
                              class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none font-medium transition-all resize-none @error('notes') border-red-500 @enderror"
                              placeholder="Tambahkan catatan atau permintaan khusus...">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Price Summary -->
        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-slate-700 dark:to-slate-600 rounded-2xl p-6 border-2 border-teal-200 dark:border-teal-800">
            <h2 class="text-xl font-black text-gray-900 dark:text-white mb-4">Ringkasan Harga</h2>
            
            <div class="space-y-3">
                <div class="flex justify-between items-center text-gray-700 dark:text-white">
                    <span class="font-medium">Harga per unit</span>
                    <span class="font-bold" id="unit-price">Rp 0</span>
                </div>
                <div class="flex justify-between items-center text-gray-700 dark:text-white">
                    <span class="font-medium">Jumlah penumpang</span>
                    <span class="font-bold" id="passenger-display">1</span>
                </div>
                <div class="h-px bg-gray-300 dark:bg-slate-500"></div>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-black text-gray-900 dark:text-white">Total Harga</span>
                    <span class="text-2xl font-black text-teal-600 dark:text-teal-400" id="total-price">Rp 0</span>
                </div>
            </div>

            <input type="hidden" name="total_price" id="total-price-input" value="0">
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-slate-700">
            <a href="{{ route('user.reservations.index') }}" 
               class="px-8 py-4 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 font-bold rounded-xl hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">
                Batal
            </a>
            <button type="submit" 
                    class="px-8 py-4 bg-gradient-to-r from-teal-600 to-cyan-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-teal-500 hover:to-cyan-500 transform hover:scale-105 transition-all duration-300">
                Buat Reservasi
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceRadios = document.querySelectorAll('input[name="service_id"]');
        const passengerInput = document.querySelector('input[name="passenger_count"]');
        const unitPriceEl = document.getElementById('unit-price');
        const passengerDisplayEl = document.getElementById('passenger-display');
        const totalPriceEl = document.getElementById('total-price');
        const totalPriceInput = document.getElementById('total-price-input');

        function updatePrice() {
            const selectedService = document.querySelector('input[name="service_id"]:checked');
            const passengerCount = parseInt(passengerInput.value) || 1;

            if (selectedService) {
                const unitPrice = parseFloat(selectedService.dataset.price);
                const totalPrice = unitPrice * passengerCount;

                unitPriceEl.textContent = 'Rp ' + formatNumber(unitPrice);
                passengerDisplayEl.textContent = passengerCount;
                totalPriceEl.textContent = 'Rp ' + formatNumber(totalPrice);
                totalPriceInput.value = totalPrice;
            }
        }

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        serviceRadios.forEach(radio => {
            radio.addEventListener('change', updatePrice);
        });

        passengerInput.addEventListener('input', updatePrice);

        // Initial update if service is preselected
        updatePrice();
    });
</script>
@endpush

@endsection
