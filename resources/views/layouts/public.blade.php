<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TransGo') }} - Perjalanan Nyaman & Aman</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* Organic blob decorations */
        .blob-decoration {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            pointer-events: none;
            z-index: 0;
        }
        
        .blob-orange {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        }
        
        .blob-teal {
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
        }
        
        .blob-purple {
            background: linear-gradient(135deg, #a855f7 0%, #6366f1 100%);
        }
        
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Card hover effects */
        .card-hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-inter text-base text-black dark:text-white dark:bg-slate-900 bg-white antialiased">
    <!-- Header -->
    <header x-data="{ navbarOpen: false }" class="fixed top-0 left-0 z-50 w-full bg-white/80 backdrop-blur-md dark:bg-slate-900/80 shadow-sm transition-all duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <!-- Logo -->
                <div class="w-60 max-w-full">
                    <a href="{{ route('home') }}" class="block w-full group">
                        <span class="text-3xl font-black bg-gradient-to-r from-orange-600 via-amber-500 to-orange-500 bg-clip-text text-transparent group-hover:from-orange-500 group-hover:to-amber-400 transition-all duration-300">
                            TransGo
                        </span>
                    </a>
                </div>

                <!-- Nav Menu -->
                <div class="flex w-full items-center justify-between px-4">
                    <div>
                        <button @click="navbarOpen = !navbarOpen" 
                            id="navbarToggler" aria-label="Mobile Menu"
                            class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-black dark:bg-white transition-all" :class="navbarOpen ? 'top-[7px] rotate-45' : ' '"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-black dark:bg-white transition-all" :class="navbarOpen ? 'opacity-0' : ' '"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-black dark:bg-white transition-all" :class="navbarOpen ? 'top-[-8px] -rotate-45' : ' '"></span>
                        </button>
                        <nav id="navbarCollapse"
                            class="absolute right-4 top-full w-full max-w-[250px] rounded-lg bg-white dark:bg-slate-800 py-5 px-6 shadow transition-all lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent dark:lg:bg-transparent lg:shadow-none lg:p-0"
                            :class="!navbarOpen && 'hidden'">
                            <ul class="block lg:flex lg:space-x-8">
                                <li>
                                    <a href="{{ route('home') }}" class="flex py-2 text-base font-semibold text-gray-700 hover:text-orange-600 dark:text-gray-300 dark:hover:text-orange-400 lg:ml-6 lg:inline-flex transition-colors">
                                        Beranda
                                    </a>
                                </li>
                                <li>
                                    <a href="#services" class="flex py-2 text-base font-semibold text-gray-700 hover:text-orange-600 dark:text-gray-300 dark:hover:text-orange-400 lg:ml-6 lg:inline-flex transition-colors">
                                        Layanan
                                    </a>
                                </li>
                                <li>
                                    <a href="#how-it-works" class="flex py-2 text-base font-semibold text-gray-700 hover:text-orange-600 dark:text-gray-300 dark:hover:text-orange-400 lg:ml-6 lg:inline-flex transition-colors">
                                        Cara Kerja
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blog.index') }}" class="flex py-2 text-base font-semibold text-gray-700 hover:text-orange-600 dark:text-gray-300 dark:hover:text-orange-400 lg:ml-6 lg:inline-flex transition-colors">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="hidden justify-end pr-16 sm:flex lg:pr-0 gap-4">
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="rounded-xl bg-gradient-to-r from-orange-500 to-amber-500 py-3 px-7 text-base font-bold text-white hover:from-teal-500 hover:to-cyan-500 shadow-lg hover:shadow-xl transition-all duration-300">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="rounded-xl bg-gradient-to-r from-orange-500 to-amber-500 py-3 px-7 text-base font-bold text-white hover:from-teal-500 hover:to-cyan-500 shadow-lg hover:shadow-xl transition-all duration-300">
                                    Dashboard Saya
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="px-7 py-3 text-base font-semibold text-gray-700 hover:text-orange-600 dark:text-gray-300 dark:hover:text-orange-400 transition-colors">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}" class="rounded-xl bg-gradient-to-r from-orange-500 to-amber-500 py-3 px-7 text-base font-bold text-white hover:from-teal-500 hover:to-cyan-500 shadow-lg hover:shadow-xl transition-all duration-300">
                                Daftar
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="min-h-screen pt-20">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-slate-900 to-gray-900 pt-20 lg:pt-24 pb-12 border-t-4 border-teal-500">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                
                <!-- Column 1: About -->
                <div class="lg:col-span-1">
                    <a href="{{ route('home') }}" class="inline-block mb-6">
                        <span class="text-3xl font-black bg-gradient-to-r from-teal-400 via-cyan-400 to-blue-400 bg-clip-text text-transparent">
                            TransGo
                        </span>
                    </a>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Partner terpercaya untuk perjalanan yang nyaman dan aman. Kami menyediakan layanan transportasi premium untuk semua kebutuhan Anda.
                    </p>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h4 class="text-lg font-black text-white mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#services" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Layanan Kami
                            </a>
                        </li>
                        <li>
                            <a href="#how-it-works" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Cara Kerja
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Company -->
                <div>
                    <h4 class="text-lg font-black text-white mb-6">Perusahaan</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Kontak
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Kebijakan Privasi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Syarat & Ketentuan
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Karir
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-slate-800">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-gray-400 text-sm text-center md:text-left">
                        &copy; {{ date('Y') }} <span class="text-orange-400 font-bold">TransGo</span>. All rights reserved.
                    </p>
                    <div class="flex items-center gap-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors">Privacy</a>
                        <span class="text-slate-700">•</span>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors">Terms</a>
                        <span class="text-slate-700">•</span>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors">Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

