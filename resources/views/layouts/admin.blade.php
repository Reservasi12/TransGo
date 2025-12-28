<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TransGo') }} Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
    </style>
    @yield('styles')
</head>

<body class="bg-gray-100 text-slate-800 dark:bg-slate-900 dark:text-gray-200" x-data="{ sidebarOpen: true, darkMode: false }">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="absolute left-0 top-0 z-50 flex h-screen w-72 flex-col overflow-y-hidden bg-white dark:bg-slate-800 shadow-lg duration-300 ease-linear lg:static lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5 border-b border-gray-100 dark:border-slate-700">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <span class="grid place-items-center w-8 h-8 rounded bg-blue-600 text-white font-bold text-lg">T</span>
                    <span class="text-xl font-bold text-slate-800 dark:text-white">TransGo</span>
                </a>

                <button class="block lg:hidden" @click.stop="sidebarOpen = !sidebarOpen">
                    <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z" fill=""/>
                    </svg>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6">
                    <div>
                        <h3 class="mb-4 ml-4 text-sm font-semibold text-gray-500 uppercase tracking-wider">Menu</h3>

                        <ul class="mb-6 flex flex-col gap-1.5">
                            
                            <!-- Dashboard -->
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                   class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-blue-600 dark:bg-slate-700 dark:text-blue-400' : 'text-gray-600 dark:text-gray-400' }}">
                                    <svg class="fill-current w-5 h-5" viewBox="0 0 20 20">
                                        <path d="M2 10C2 5.58172 5.58172 2 10 2V10H18C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10Z" />
                                        <path d="M12 2.25195C14.8113 2.97552 17.0245 5.18877 17.748 8.00004H12V2.25195Z" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>

                            <!-- Users (Only for Admin, not Staff) -->
                            @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('admin.users.index') }}"
                                   class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 dark:text-gray-400' }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    Pengguna
                                </a>
                            </li>
                            @endif
                            
                            <!-- Services -->
                            <li>
                                <a href="{{ route('admin.transport-services.index') }}"
                                   class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.transport-services.*') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 dark:text-gray-400' }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                                    Layanan Transportasi
                                </a>
                            </li>
                            
                            <!-- Reservations -->
                            <li>
                                <a href="{{ route('admin.reservations.index') }}"
                                   class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.reservations.*') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 dark:text-gray-400' }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Reservasi
                                </a>
                            </li>

                            <!-- Cancellations -->
                            <li>
                                <a href="{{ route('admin.cancellations.index') }}"
                                   class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.cancellations.*') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 dark:text-gray-400' }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    Pembatalan
                                </a>
                            </li>
                            
                            <!-- Blogs -->
                            <li>
                                <a href="{{ route('admin.blogs.index') }}"
                                   class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.blogs.*') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 dark:text-gray-400' }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Content Area -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            
            <!-- Header -->
            <header class="sticky top-0 z-40 flex w-full bg-white drop-shadow-1 dark:bg-slate-800 dark:drop-shadow-none">
                <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
                    <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
                        <!-- Hamburger Toggle -->
                        <button class="z-50 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-slate-700 dark:bg-slate-800 lg:hidden"
                            @click.stop="sidebarOpen = !sidebarOpen">
                            <span class="relative block h-5.5 w-5.5 cursor-pointer">
                                <span class="du-block absolute right-0 h-full w-full">
                                    <span class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-[0] duration-200 ease-in-out dark:bg-white" :class="!sidebarOpen && '!w-full delay-300'"></span>
                                    <span class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-150 duration-200 ease-in-out dark:bg-white" :class="!sidebarOpen && 'delay-400 !w-full'"></span>
                                    <span class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-200 duration-200 ease-in-out dark:bg-white" :class="!sidebarOpen && '!w-full delay-500'"></span>
                                </span>
                            </span>
                        </button>
                    </div>

                    <div class="hidden sm:block">
                        <form action="https://formbold.com/s/unique_form_id" method="POST">
                            <div class="relative">
                                <span class="absolute left-0 top-1/2 -translate-y-1/2">
                                    <svg class="fill-gray-500" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.16666 3.33332C5.945 3.33332 3.33332 5.945 3.33332 9.16666C3.33332 12.3883 5.945 15 9.16666 15C12.3883 15 15 12.3883 15 9.16666C15 5.945 12.3883 3.33332 9.16666 3.33332ZM1.66666 9.16666C1.66666 5.02452 5.02452 1.66666 9.16666 1.66666C13.3088 1.66666 16.6667 5.02452 16.6667 9.16666C16.6667 13.3088 13.3088 16.6667 9.16666 16.6667C5.02452 16.6667 1.66666 13.3088 1.66666 9.16666Z" fill=""/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4642 13.2857L18.0892 16.9107C18.4147 17.2362 18.4147 17.7638 18.0892 18.0892C17.7638 18.4147 17.2362 18.4147 16.9107 18.0892L13.2857 14.4642C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z" fill=""/>
                                    </svg>
                                </span>
                                <input type="text" placeholder="Ketik untuk mencari..."
                                    class="w-full bg-transparent pl-9 pr-4 text-sm font-medium focus:outline-none xl:w-125 dark:text-white" />
                            </div>
                        </form>
                    </div>

                    <div class="flex items-center gap-3 2xsm:gap-7">
                        <!-- User Area -->
                        <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                            <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = !dropdownOpen">
                                <span class="hidden text-right lg:block">
                                    <span class="block text-sm font-medium text-black dark:text-white">{{ Auth::user()->name ?? 'Admin' }}</span>
                                    <span class="block text-xs font-medium text-gray-400">Administrator</span>
                                </span>
                                <span class="h-10 w-10 rounded-full overflow-hidden bg-gray-200">
                                     <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=0D8ABC&color=fff" alt="User" />
                                </span>
                                <svg class="hidden fill-current sm:block w-4 h-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- Dropdown -->
                            <div x-show="dropdownOpen"
                                 class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-slate-700 dark:bg-slate-800"
                                 x-transition.origin.top.right>
                                <ul class="flex flex-col gap-5 border-b border-stroke px-6 py-7.5 dark:border-strokedark">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-blue-600 lg:text-base">
                                                <svg class="fill-current w-5 h-5" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.5375 0.6125C15.225 0.3 14.7125 0.3 14.4 0.6125C14.0875 0.925 14.0875 1.4375 14.4 1.75L19.0125 6.3625H0.8125C0.375 6.3625 0 6.7375 0 7.175C0 7.6125 0.375 7.9875 0.8125 7.9875H19.0125L14.4 12.6C14.0875 12.9125 14.0875 13.425 14.4 13.7375C14.5625 13.9 14.7625 13.975 14.975 13.975C15.1875 13.975 15.3875 13.9 15.55 13.7375L21.575 7.7125C21.8875 7.4 21.8875 6.8875 21.575 6.575L15.5375 0.6125Z" fill=""/>
                                                </svg>
                                                Keluar
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded bg-green-50 text-green-700 border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
