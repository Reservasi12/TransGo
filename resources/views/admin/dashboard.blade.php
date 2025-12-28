@extends('layouts.admin')

@section('content')
    <!-- Dashboard Header -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Dashboard
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
                <li class="font-medium text-blue-600">Overview</li>
            </ol>
        </nav>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        <!-- Card: Reservations Today -->
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/20">
                <svg class="fill-current w-6 h-6" viewBox="0 0 24 24"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/></svg>
            </div>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">{{ $totalReservationsToday }}</h4>
                    <span class="text-sm font-medium text-gray-500">Reservasi Hari Ini</span>
                </div>
            </div>
        </div>

        <!-- Card: Revenue Today -->
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/20">
                <svg class="fill-current w-6 h-6" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.15-1.46-3.27-3.63h1.96c.1 1.05.69 1.91 1.83 1.91 1.05 0 1.69-.74 1.69-1.71 0-1.55-1.92-2.02-3.46-2.5-2-.64-2.88-1.98-2.88-3.32 0-2.02 1.4-3.15 3.12-3.5V3h2.67v1.9c1.47.33 2.76 1.34 2.94 3.28h-1.96c-.1-1.01-.6-1.57-1.54-1.57-.86 0-1.54.55-1.54 1.5 0 1.41 1.92 1.88 3.51 2.39 2.12.68 2.83 2.06 2.83 3.41 0 2.22-1.47 3.39-3.23 3.68z"/></svg>
            </div>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">IDR {{ number_format($totalRevenueToday, 0, ',', '.') }}</h4>
                    <span class="text-sm font-medium text-gray-500">Pendapatan Hari Ini</span>
                </div>
            </div>
        </div>

        <!-- Card: Pending Cancellations -->
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/20">
                <svg class="fill-current w-6 h-6" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11H7v-2h10v2z"/></svg>
            </div>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">{{ $pendingCancellations }}</h4>
                    <span class="text-sm font-medium text-gray-500">Pengajuan Pembatalan</span>
                </div>
            </div>
        </div>

        <!-- Card: Total Users -->
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
             <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/20">
                <svg class="fill-current w-6 h-6" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </div>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">{{ $totalUsers }}</h4>
                    <span class="text-sm font-medium text-gray-500">Total User</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="mt-4 grid grid-cols-1 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
        <div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:px-7.5">
            <h3 class="mb-2 text-xl font-bold text-black dark:text-white">Reservasi & Pendapatan Bulanan</h3>
             <div id="revenueChart" class="-ml-5"></div>
        </div>
    </div>

    <!-- Recent Reservations Table -->
     <div class="mt-4 rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:px-7.5 xl:pb-1">
        <h4 class="mb-6 text-xl font-bold text-black dark:text-white">Reservasi Terbaru</h4>
        <div class="flex flex-col">
            <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-slate-700 sm:grid-cols-5">
                <div class="p-2.5 xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base text-gray-500">Customer</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base text-gray-500">Service</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base text-gray-500">Tanggal</h5>
                </div>
                <div class="hidden p-2.5 text-center sm:block xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base text-gray-500">Status</h5>
                </div>
                <div class="hidden p-2.5 text-center sm:block xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base text-gray-500">Total</h5>
                </div>
            </div>

            @foreach($recentReservations as $reservation)
            <div class="grid grid-cols-3 border-b border-stroke dark:border-slate-700 sm:grid-cols-5 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition duration-150">
                <div class="flex items-center gap-3 p-2.5 xl:p-5">
                    <p class="hidden text-black dark:text-white sm:block">{{ $reservation->user->name }}</p>
                </div>
                <div class="flex items-center justify-center p-2.5 xl:p-5">
                    <p class="text-black dark:text-white">{{ $reservation->transportService->name }}</p>
                </div>
                <div class="flex items-center justify-center p-2.5 xl:p-5">
                    <p class="text-meta-3">{{ $reservation->reservation_date }}</p>
                </div>
                <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                    <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ $reservation->status === 'approved' ? 'bg-green-100 text-green-700' : ($reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                        {{ ucfirst($reservation->status) }}
                    </span>
                </div>
                <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                    <p class="text-black dark:text-white">IDR {{ number_format($reservation->total_price, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [{
                    name: 'Revenue',
                    data: [30, 40, 35, 50, 49, 60, 70, 91, 125, 200, 230, 250] // Sample data
                }, {
                    name: 'Reservations',
                    data: [20, 30, 25, 40, 39, 50, 60, 81, 105, 120, 140, 160] // Sample data
                }],
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: { show: false }
                },
                colors: ['#3C50E0', '#80CAEE'],
                fill: {
                  type: "gradient",
                  gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                  }
                },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 2 },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                grid: {
                    strokeDashArray: 5,
                     xaxis: {
                        lines: {
                            show: false
                        }
                    },   
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }, 
                },
                legend: { position: 'top', horizontalAlign: 'right' },
            };

            var chart = new ApexCharts(document.querySelector("#revenueChart"), options);
            chart.render();
        });
    </script>
@endsection
