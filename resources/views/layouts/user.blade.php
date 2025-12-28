<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - {{ config('app.name') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-inter bg-gray-50 dark:bg-slate-900" x-data="{ sidebarOpen: false, darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">
    
    <!-- Page Wrapper -->
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="absolute left-0 top-0 z-50 flex h-screen w-72 flex-col overflow-y-hidden bg-gradient-to-b from-gray-900 via-slate-900 to-gray-900 duration-300 ease-linear lg:static lg:translate-x-0 shadow-2xl">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between gap-2 px-6 py-6 border-b border-slate-800">
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-black bg-gradient-to-r from-teal-400 to-cyan-400 bg-clip-text text-transparent">
                        TransGo
                    </span>
                </a>
                <button @click.stop="sidebarOpen = !sidebarOpen" class="block lg:hidden text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-1 overflow-y-auto py-6 px-4">
                <div class="space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('user.dashboard') }}"
                       class="group flex items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-slate-800 hover:text-white {{ request()->routeIs('user.dashboard') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- My Reservations -->
                    <a href="{{ route('user.reservations.index') }}"
                       class="group flex items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-slate-800 hover:text-white {{ request()->routeIs('user.reservations.*') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Reservasi Saya</span>
                    </a>

                    <!-- Check-in -->
                    <a href="{{ route('user.checkin.index') }}"
                       class="group flex items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-slate-800 hover:text-white {{ request()->routeIs('user.checkin.*') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Check-in</span>
                    </a>

                    <!-- Cancellations -->
                    <a href="{{ route('user.cancellations.index') }}"
                       class="group flex items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-slate-800 hover:text-white {{ request()->routeIs('user.cancellations.*') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span>Pembatalan</span>
                    </a>

                    <!-- Profile -->
                    <a href="{{ route('user.profile.index') }}"
                       class="group flex items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-slate-800 hover:text-white {{ request()->routeIs('user.profile.*') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg' : '' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        <span>Profil Saya</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="my-6 h-px bg-slate-800"></div>

                <!-- Quick Actions -->
                <div class="space-y-2">
                    <p class="px-4 text-xs font-black text-gray-500 uppercase tracking-wider">Quick Actions</p>
                    <a href="{{ route('user.reservations.create') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-teal-600 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Buat Reservasi</span>
                    </a>
                    <a href="{{ route('home') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-slate-800 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Ke Beranda</span>
                    </a>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="px-4 py-6 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-3 font-semibold text-gray-300 transition-all duration-200 hover:bg-red-600 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Content Area -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            
            <!-- Header -->
            <header class="sticky top-0 z-30 bg-white dark:bg-slate-800 shadow-sm border-b border-gray-200 dark:border-slate-700">
                <div class="flex items-center justify-between px-6 py-4">
                    
                    <!-- Mobile menu button -->
                    <button @click.stop="sidebarOpen = !sidebarOpen" 
                            class="flex items-center gap-2 lg:hidden px-4 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <span class="font-semibold">Menu</span>
                    </button>

                    <!-- Page Title - Hidden on mobile, shown in content on mobile -->
                    <div class="hidden lg:block">
                        <h1 class="text-2xl font-black text-gray-900 dark:text-white">
                            @yield('page-title', 'Dashboard')
                        </h1>
                    </div>

                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                        <button @click="dropdownOpen = !dropdownOpen" 
                                class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                            <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-full">
                                <span class="text-white font-black text-lg">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <div class="hidden sm:block text-left">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Pengguna</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="dropdownOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-56 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-gray-200 dark:border-slate-700 overflow-hidden"
                             style="display: none;">
                            
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-slate-700">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="py-2">
                                <a href="{{ route('user.profile.index') }}"
                                   class="flex items-center gap-3 px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    Profil Saya
                                </a>
                                <a href="{{ route('home') }}"
                                   class="flex items-center gap-3 px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    Ke Beranda
                                </a>
                            </div>

                            <div class="border-t border-gray-200 dark:border-slate-700">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="flex w-full items-center gap-3 px-4 py-3 text-sm font-semibold text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-6 lg:p-8 bg-gray-50 dark:bg-slate-900">
                
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 flex items-start gap-3 rounded-2xl bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-4 border-l-4 border-green-500" 
                         x-data="{ show: true }" 
                         x-show="show"
                         x-transition>
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1">
                            <p class="font-bold text-green-800 dark:text-white">Berhasil!</p>
                            <p class="text-sm text-green-700 dark:text-white">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-green-600 dark:text-white hover:text-green-800 dark:hover:text-green-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 flex items-start gap-3 rounded-2xl bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/20 p-4 border-l-4 border-red-500"
                         x-data="{ show: true }" 
                         x-show="show"
                         x-transition>
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1">
                            <p class="font-bold text-red-800 dark:text-white">Error!</p>
                            <p class="text-sm text-red-700 dark:text-white">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-red-600 dark:text-white hover:text-red-800 dark:hover:text-red-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
