@extends('layouts.public')

@section('content')

<!-- HERO SECTION -->
<section class="relative overflow-hidden bg-gradient-to-br from-orange-50/40 via-amber-50/30 to-yellow-50/20 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 pt-24 pb-16 sm:pt-32 sm:pb-20 lg:pt-40 lg:pb-32">
    <!-- Decorative Blobs - Hidden on mobile for better performance -->
    <div class="blob-decoration blob-teal w-48 h-48 sm:w-64 sm:h-64 lg:w-96 lg:h-96 -top-20 -left-20 hidden sm:block"></div>
    <div class="blob-decoration blob-orange w-64 h-64 sm:w-80 sm:h-80 lg:w-[500px] lg:h-[500px] top-40 -right-40 hidden sm:block"></div>
    <div class="blob-decoration blob-purple w-36 h-36 sm:w-48 sm:h-48 lg:w-72 lg:h-72 bottom-20 left-1/3 hidden sm:block"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-12 items-center">
            
            <!-- Left Content -->
            <div class="lg:col-span-7 space-y-6 sm:space-y-8">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 sm:px-5 sm:py-2.5 bg-orange-100 dark:bg-orange-900/30 rounded-full">
                    <span class="text-xs sm:text-sm font-bold text-orange-600 dark:text-orange-300 uppercase tracking-wide">
                        Transportasi Terpercaya
                    </span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-[#181E4B] dark:text-white leading-tight">
                    Perjalanan Nyaman <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-amber-500">
                        Dimulai Dari Sini
                    </span>
                </h1>

                <!-- Description -->
                <p class="text-base sm:text-lg lg:text-xl xl:text-2xl text-gray-600 dark:text-gray-300 max-w-2xl leading-relaxed">
                    TransGo adalah partner terpercaya untuk semua kebutuhan transportasi Anda. Aman, nyaman, dan profesional.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    @auth
                        <a href="{{ route('user.reservations.create') }}" 
                           class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-orange-500 to-amber-500 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl hover:from-orange-600 hover:to-amber-600 transform hover:scale-105 transition-all duration-300">
                            Mulai Perjalanan
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-orange-500 to-amber-500 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl hover:from-orange-600 hover:to-amber-600 transform hover:scale-105 transition-all duration-300">
                            Mulai Sekarang
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    @endauth
                    
                    <a href="#how-it-works" 
                       class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white dark:bg-slate-800 text-gray-900 dark:text-white font-bold rounded-2xl shadow-lg hover:shadow-xl border-2 border-gray-200 dark:border-slate-700 hover:border-orange-500 dark:hover:border-orange-500 transition-all duration-300">
                        <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                        </svg>
                        Lihat Cara Kerja
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 sm:gap-6 pt-6 sm:pt-8">
                    <div class="text-center lg:text-left">
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-orange-600 dark:text-teal-400">500+</div>
                        <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-medium mt-1">Perjalanan Sukses</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-cyan-600 dark:text-cyan-400">98%</div>
                        <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-medium mt-1">Kepuasan Pelanggan</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-blue-600 dark:text-blue-400">24/7</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 font-medium mt-1">Layanan Support</div>
                    </div>
                </div>
            </div>

            <!-- Right Content - Hero Image -->
            <div class="lg:col-span-5 relative">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-cyan-400 rounded-3xl transform rotate-6 opacity-20"></div>
                    <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=800&q=80" 
                         alt="Transportasi TransGo" 
                         class="relative rounded-3xl shadow-2xl w-full h-auto object-cover">
                </div>
                
                <!-- Floating Card - Popular Service -->
                <div class="absolute -bottom-8 -left-8 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl p-5 hidden lg:block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-600 to-amber-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 dark:text-white">Bus Pariwisata</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Tersedia 24/7</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- BOOKING FORM SECTION -->
<section class="relative -mt-8 sm:-mt-12 z-20 pb-12 sm:pb-16 lg:pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl shadow-2xl p-4 sm:p-6 lg:p-10 max-w-6xl mx-auto border border-gray-100 dark:border-slate-700">
            <form action="{{ route('user.reservations.create') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6 items-end">
                
                <!-- Transport Type -->
                <div class="space-y-3">
                    <label class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                        </svg>
                        Jenis Transportasi
                    </label>
                    <select name="transport_type" class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-orange-500 outline-none font-medium transition-all">
                        <option>Bus Pariwisata</option>
                        <option>Mini Bus</option>
                        <option>Mobil Keluarga</option>
                        <option>Travel</option>
                    </select>
                </div>

                <!-- Departure Date -->
                <div class="space-y-3">
                    <label class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        Tanggal Berangkat
                    </label>
                    <input type="date" name="departure_date" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-orange-500 outline-none font-medium transition-all"
                           value="{{ date('Y-m-d') }}">
                </div>

                <!-- Return Date -->
                <div class="space-y-3">
                    <label class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        Tanggal Kembali
                    </label>
                    <input type="date" name="return_date" 
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-orange-500 outline-none font-medium transition-all"
                           value="{{ date('Y-m-d', strtotime('+3 days')) }}">
                </div>

                <!-- Guests -->
                <div class="space-y-3">
                    <label class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        Jumlah Penumpang
                    </label>
                    <select name="guests" class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-teal-500 focus:border-orange-500 outline-none font-medium transition-all">
                        <option>1 Dewasa</option>
                        <option>2 Dewasa</option>
                        <option>3-5 Orang</option>
                        <option>6-10 Orang</option>
                        <option>10+ Orang</option>
                    </select>
                </div>

                <!-- Search Button -->
                <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-orange-500 to-amber-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-orange-600 hover:to-amber-600 transform hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cari
                </button>

            </form>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section id="services" class="py-12 sm:py-16 lg:py-20 xl:py-28 bg-white dark:bg-slate-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-10 sm:mb-12 lg:mb-16">
            <span class="inline-block px-4 py-2 sm:px-6 sm:py-3 mb-4 sm:mb-6 text-xs sm:text-sm font-black rounded-full bg-orange-100 text-teal-700 dark:bg-orange-900/30 dark:text-teal-300 uppercase tracking-wider">
                Layanan Kami
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black text-gray-900 dark:text-white mb-4 sm:mb-6">
                Pilih Kendaraan Terbaik
            </h2>
            <p class="text-base sm:text-lg lg:text-xl text-gray-600 dark:text-gray-400">
                Pilihan transportasi aman dan nyaman untuk semua kebutuhan perjalanan Anda.
            </p>
        </div>

        <!-- Service Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($transportServices as $service)
            <div class="group bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-lg border-2 border-gray-100 dark:border-slate-700 card-hover-lift">

                <!-- Image -->
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ $service->image ? Storage::url($service->image) : 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=600' }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                         alt="{{ $service->name }}">
                    
                    <!-- Type Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-2 bg-white/95 backdrop-blur-sm text-teal-700 text-xs font-black rounded-full shadow-lg uppercase">
                            {{ $service->type }}
                        </span>
                    </div>

                    <!-- Price Badge -->
                    <div class="absolute bottom-4 right-4">
                        <span class="px-5 py-2.5 bg-gradient-to-r from-orange-500 to-amber-500 text-white text-sm font-black rounded-full shadow-xl">
                            Rp {{ number_format($service->price,0,',','.') }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-4">
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white group-hover:text-orange-600 dark:group-hover:text-teal-400 transition">
                        {{ $service->name }}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ Str::limit($service->description, 100) }}
                    </p>

                    <!-- Features -->
                    <div class="flex items-center gap-6 text-sm text-gray-500 dark:text-gray-400 font-medium">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                            </svg>
                            <span>{{ $service->capacity }} seat</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Semua Rute</span>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    @auth
                        <a href="{{ route('user.reservations.create') }}"
                           class="block w-full text-center rounded-xl bg-gradient-to-r from-orange-500 to-amber-500 py-4 font-bold text-white shadow-lg hover:shadow-xl hover:from-orange-600 hover:to-amber-600 transform hover:scale-105 transition-all duration-300">
                            Pesan Sekarang
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="block w-full text-center rounded-xl bg-gradient-to-r from-gray-600 to-gray-700 py-4 font-bold text-white shadow-lg hover:shadow-xl hover:from-gray-500 hover:to-gray-600 transition-all duration-300">
                            Login untuk Memesan
                        </a>
                    @endauth
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- HOW IT WORKS SECTION -->
<section id="how-it-works" class="py-20 lg:py-28 bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-slate-800 dark:to-slate-900">
    <div class="container mx-auto px-4">
        
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <span class="inline-block px-6 py-3 mb-6 text-sm font-black rounded-full bg-cyan-100 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300 uppercase tracking-wider">
                Mudah & Cepat
            </span>
            <h2 class="text-4xl lg:text-5xl xl:text-6xl font-black text-gray-900 dark:text-white mb-6">
                3 Langkah Mudah
            </h2>
            <p class="text-lg lg:text-xl text-gray-600 dark:text-gray-400">
                Pesan transportasi dengan cepat dan mudah dalam 3 langkah sederhana
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Left Side - Steps -->
            <div class="space-y-8">
                
                <!-- Step 1 -->
                <div class="flex gap-6 items-start group">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-orange-600 to-amber-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl font-black text-white">1</span>
                    </div>
                    <div class="flex-1 pt-2">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-3">Pilih Transportasi</h3>
                        <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                            Pilih jenis kendaraan yang sesuai dengan kebutuhan perjalanan Anda. Kami menyediakan berbagai pilihan dari travel hingga bus pariwisata.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex gap-6 items-start group">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl font-black text-white">2</span>
                    </div>
                    <div class="flex-1 pt-2">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-3">Tentukan Jadwal</h3>
                        <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                            Pilih tanggal keberangkatan dan kepulangan Anda. Isi detail penumpang dan informasi kontak untuk konfirmasi.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex gap-6 items-start group">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl font-black text-white">3</span>
                    </div>
                    <div class="flex-1 pt-2">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-3">Konfirmasi & Nikmati</h3>
                        <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                            Konfirmasi pemesanan Anda dan lakukan pembayaran. Setelah itu, Anda siap untuk menikmati perjalanan yang nyaman bersama TransGo!
                        </p>
                    </div>
                </div>

            </div>

            <!-- Right Side - Visual -->
            <div class="relative">
                <!-- Main Card -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl p-8 border-2 border-gray-100 dark:border-slate-700">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-xl font-black text-gray-900 dark:text-white">Form Reservasi</h4>
                            <span class="px-4 py-1.5 bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300 text-sm font-bold rounded-full">Active</span>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="h-12 bg-gray-100 dark:bg-slate-700 rounded-xl"></div>
                            <div class="h-12 bg-gray-100 dark:bg-slate-700 rounded-xl"></div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="h-12 bg-gray-100 dark:bg-slate-700 rounded-xl"></div>
                                <div class="h-12 bg-gray-100 dark:bg-slate-700 rounded-xl"></div>
                            </div>
                            <div class="h-14 bg-gradient-to-r from-orange-500 to-amber-500 rounded-xl"></div>
                        </div>
                    </div>
                </div>

                <!-- Floating Success Badge -->
                <div class="absolute -top-6 -right-6 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl p-4 border-2 border-green-200 dark:border-green-800 animate-bounce">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-black text-gray-900 dark:text-white">Berhasil!</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Booking confirmed</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- STATISTICS SECTION -->
<section id="statistics" class="py-16 sm:py-20 lg:py-28 bg-gradient-to-br from-gray-50 to-blue-50 dark:from-slate-900 dark:to-slate-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-16">
            <span class="inline-block px-4 py-2 sm:px-6 sm:py-3 mb-4 sm:mb-6 text-xs sm:text-sm font-black rounded-full bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 uppercase tracking-wider">
                Statistik Kami
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black text-gray-900 dark:text-white mb-4 sm:mb-6">
                Kepercayaan Dalam Angka
            </h2>
            <p class="text-base sm:text-lg lg:text-xl text-gray-600 dark:text-gray-400">
                Data real-time performa layanan TransGo yang transparan dan terukur
            </p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-12 sm:mb-16">
            
            <!-- Stat 1: Total Reservations -->
            <div class="group bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-lg border-2 border-gray-100 dark:border-slate-700 hover:shadow-xl hover:border-blue-200 dark:hover:border-blue-800 transition-all duration-300">
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <div class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 dark:text-white mb-2 sm:mb-3">{{ number_format($stats['total_reservations']) }}</h3>
                <p class="text-sm sm:text-base font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Total Reservasi</p>
                <div class="mt-3 sm:mt-4 flex items-center gap-2 text-xs sm:text-sm {{ $stats['monthly_growth'] >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }} font-semibold">
                    @if($stats['monthly_growth'] >= 0)
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                    </svg>
                    @else
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z" clip-rule="evenodd"/>
                    </svg>
                    @endif
                    {{ $stats['monthly_growth'] >= 0 ? '+' : '' }}{{ $stats['monthly_growth'] }}% bulan ini
                </div>
            </div>

            <!-- Stat 2: Confirmed -->
            <div class="group bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-lg border-2 border-gray-100 dark:border-slate-700 hover:shadow-xl hover:border-green-200 dark:hover:border-green-800 transition-all duration-300">
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <div class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 dark:text-white mb-2 sm:mb-3">{{ number_format($stats['confirmed_reservations']) }}</h3>
                <p class="text-sm sm:text-base font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Terkonfirmasi</p>
                <div class="mt-3 sm:mt-4 flex items-center gap-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-semibold">
                    {{ $stats['total_reservations'] > 0 ? round(($stats['confirmed_reservations'] / $stats['total_reservations']) * 100) : 0 }}% tingkat konfirmasi
                </div>
            </div>

            <!-- Stat 3: Revenue -->
            <div class="group bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-lg border-2 border-gray-100 dark:border-slate-700 hover:shadow-xl hover:border-orange-200 dark:hover:border-orange-800 transition-all duration-300">
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <div class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-orange-600 to-amber-600 rounded-2xl shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 dark:text-white mb-2 sm:mb-3">
                    @if($stats['total_revenue'] >= 1000000000)
                        Rp {{ number_format($stats['total_revenue'] / 1000000000, 1) }} M
                    @elseif($stats['total_revenue'] >= 1000000)
                        Rp {{ number_format($stats['total_revenue'] / 1000000, 0) }} Jt
                    @else
                        Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}
                    @endif
                </h3>
                <p class="text-sm sm:text-base font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Total Revenue</p>
                <div class="mt-3 sm:mt-4 flex items-center gap-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-semibold">
                    dari {{ number_format($stats['confirmed_reservations']) }} booking
                </div>
            </div>

            <!-- Stat 4: Satisfaction -->
            <div class="group bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-lg border-2 border-gray-100 dark:border-slate-700 hover:shadow-xl hover:border-amber-200 dark:hover:border-amber-800 transition-all duration-300">
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <div class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 dark:text-white mb-2 sm:mb-3">{{ number_format($stats['average_rating'], 1) }}/5</h3>
                <p class="text-sm sm:text-base font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Rating Pelanggan</p>
                <div class="mt-3 sm:mt-4 flex items-center gap-1">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="text-center">
            <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 mb-6 sm:mb-8">
                Bergabunglah dengan ribuan pelanggan yang puas dengan layanan kami
            </p>
            <a href="{{ route('register') }}" 
               class="inline-flex items-center gap-3 px-8 py-4 sm:px-10 sm:py-5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-base sm:text-lg font-bold rounded-2xl shadow-xl hover:shadow-2xl hover:from-blue-500 hover:to-indigo-500 transform hover:scale-105 transition-all duration-300">
                Daftar Sekarang Gratis
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>

    </div>
</section>

<!-- TESTIMONIALS SECTION -->
<section class="py-20 lg:py-28 bg-white dark:bg-slate-900">
    <div class="container mx-auto px-4">
        
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <span class="inline-block px-6 py-3 mb-6 text-sm font-black rounded-full bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300 uppercase tracking-wider">
                Testimoni
            </span>
            <h2 class="text-4xl lg:text-5xl xl:text-6xl font-black text-gray-900 dark:text-white mb-6">
                Kata Mereka Tentang Kami
            </h2>
            <p class="text-lg lg:text-xl text-gray-600 dark:text-gray-400">
                Pengalaman nyata dari pelanggan yang telah mempercayai TransGo
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Testimonial 1 -->
            <div class="bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-slate-800 dark:to-slate-700 rounded-3xl p-8 shadow-lg card-hover-lift">
                <div class="flex items-center gap-1 mb-6">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed mb-6 italic">
                    "Pelayanan yang sangat memuaskan! Driver profesional dan armada sangat nyaman. Perjalanan kami ke Bandung jadi sangat menyenangkan."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-orange-600 to-amber-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-black text-xl">BS</span>
                    </div>
                    <div>
                        <div class="font-black text-gray-900 dark:text-white">Budi Santoso</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">CEO, PT Maju Jaya</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 dark:from-slate-800 dark:to-slate-700 rounded-3xl p-8 shadow-lg card-hover-lift">
                <div class="flex items-center gap-1 mb-6">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed mb-6 italic">
                    "Booking online sangat mudah, harga kompetitif, dan tepat waktu. Sangat direkomendasikan untuk perjalanan keluarga!"
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-black text-xl">SP</span>
                    </div>
                    <div>
                        <div class="font-black text-gray-900 dark:text-white">Siti Putri</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Ibu Rumah Tangga</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-slate-800 dark:to-slate-700 rounded-3xl p-8 shadow-lg card-hover-lift">
                <div class="flex items-center gap-1 mb-6">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed mb-6 italic">
                    "Sudah 3 kali pakai jasa TransGo untuk study tour sekolah. Selalu puas dengan pelayanannya. Keep it up!"
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-black text-xl">AW</span>
                    </div>
                    <div>
                        <div class="font-black text-gray-900 dark:text-white">Ahmad Wijaya</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Guru SMA</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- BLOG SECTION -->
<section class="py-20 lg:py-28 bg-gradient-to-br from-gray-50 to-teal-50 dark:from-slate-900 dark:to-slate-800">
    <div class="container mx-auto px-4">

        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <span class="inline-block px-6 py-3 mb-6 text-sm font-black rounded-full bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-300 uppercase tracking-wider">
                Blog & Artikel
            </span>
            <h2 class="text-4xl lg:text-5xl xl:text-6xl font-black text-gray-900 dark:text-white mb-6">
                Tips & Cerita Perjalanan
            </h2>
            <p class="text-lg lg:text-xl text-gray-600 dark:text-gray-400">
                Panduan perjalanan, tips transportasi, dan informasi terbaru untuk Anda
            </p>
        </div>

        <!-- Blog Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
            <article class="group bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-lg border-2 border-gray-100 dark:border-slate-700 card-hover-lift">

                <!-- Image -->
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ $blog->featured_image ? asset('storage/'.$blog->featured_image) : 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600' }}"
                         onerror="this.src='https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600';"
                         class="h-full w-full object-cover group-hover:scale-110 transition duration-700"
                         alt="{{ $blog->title }}">

                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-2 bg-purple-600 text-white text-xs font-black rounded-full shadow-lg uppercase">
                            {{ $blog->category ?? 'Travel' }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-4">
                    <h3 class="text-xl font-black text-gray-900 dark:text-white leading-snug group-hover:text-orange-600 dark:group-hover:text-teal-400 transition line-clamp-2">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            {{ $blog->title }}
                        </a>
                    </h3>

                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-3">
                        {{ Str::limit($blog->excerpt, 110) }}
                    </p>

                    <a href="{{ route('blog.show', $blog->slug) }}"
                       class="inline-flex items-center font-bold text-orange-600 hover:text-teal-700 dark:text-teal-400 dark:hover:text-teal-300 group-hover:gap-3 gap-2 transition-all">
                        Baca Selengkapnya
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>

            </article>
            @empty
                <div class="col-span-3 text-center py-12">
                    <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">
                        Belum ada artikel yang dipublikasikan.
                    </p>
                </div>
            @endforelse
        </div>

        <!-- View All Button -->
        @if($blogs->count() > 0)
        <div class="text-center mt-12">
            <a href="{{ route('blog.index') }}" 
               class="inline-flex items-center gap-3 px-10 py-4 bg-white dark:bg-slate-800 text-gray-900 dark:text-white font-bold rounded-2xl shadow-lg hover:shadow-xl border-2 border-gray-200 dark:border-slate-700 hover:border-orange-500 dark:hover:border-orange-500 transform hover:scale-105 transition-all duration-300">
                Lihat Semua Artikel
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
        @endif

    </div>
</section>

@endsection
