@extends('layouts.public')

@section('content')

<!-- Page Header -->
<section class="relative overflow-hidden bg-gradient-to-r from-teal-600 via-cyan-600 to-blue-600 py-16 sm:py-20 lg:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <span class="inline-block px-4 py-2 sm:px-6 sm:py-3 mb-4 sm:mb-6 text-xs sm:text-sm font-black rounded-full bg-white/20 backdrop-blur-sm uppercase tracking-wider">
                Data & Statistik
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-4 sm:mb-6">
                TransGo Statistics
            </h1>
            <p class="text-base sm:text-lg lg:text-xl text-cyan-100">
                Transparansi data performa layanan dan pertumbuhan kami
            </p>
        </div>
    </div>
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
</section>

<!-- Stats Overview Cards -->
<section class="py-12 sm:py-16 bg-gray-50 dark:bg-slate-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @foreach($reservationsByStatus as $status)
            <div class="bg-white dark:bg-slate-800 rounded-xl sm:rounded-2xl shadow-lg border-2 border-gray-100 dark:border-slate-700 p-6 sm:p-8 text-center hover:shadow-xl transition-all duration-300">
                <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br 
                    {{ $status['booking_status'] === 'confirmed' ? 'from-green-500 to-emerald-500' : 
                       ($status['booking_status'] === 'pending' ? 'from-amber-500 to-orange-500' : 
                       'from-gray-500 to-slate-500') }} 
                    rounded-2xl shadow-lg mb-4 sm:mb-6">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        @if($status['booking_status'] === 'confirmed')
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        @elseif($status['booking_status'] === 'pending')
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        @else
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        @endif
                    </svg>
                </div>
                <h4 class="text-4xl sm:text-5xl font-black text-gray-900 dark:text-white mb-2 sm:mb-3">
                    {{ $status['count'] }}
                </h4>
                <span class="text-sm sm:text-base font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                    {{ $status['booking_status'] }} Bookings
                </span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Charts Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-white dark:bg-slate-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
            
            <!-- Monthly Reservations Chart -->
            <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl border-2 border-gray-100 dark:border-slate-700 shadow-xl overflow-hidden">
                <div class="px-6 py-5 sm:px-8 sm:py-6 border-b border-gray-200 dark:border-slate-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-gray-900 dark:text-white">Tren Booking Bulanan</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Grafik reservasi per bulan</p>
                        </div>
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div id="reservationsChart"></div>
                </div>
            </div>

            <!-- Service Distribution Chart -->
            <div class="lg:col-span-1 bg-white dark:bg-slate-800 rounded-2xl sm:rounded-3xl border-2 border-gray-100 dark:border-slate-700 shadow-xl overflow-hidden">
                <div class="px-6 py-5 sm:px-8 sm:py-6 border-b border-gray-200 dark:border-slate-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-gray-900 dark:text-white">Popularitas Layanan</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Distribusi per jenis</p>
                        </div>
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div id="serviceTypeChart"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Load ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Prepare Data
        const reservationData = @json($reservationsData);
        const transportTypes = @json($transportTypes);
        
        const months = reservationData.map(item => item.month);
        const counts = reservationData.map(item => item.count);

        const typeLabels = transportTypes.map(item => item.type);
        const typeCounts = transportTypes.map(item => item.count);

        // Check dark mode
        const isDark = document.documentElement.classList.contains('dark');

        // Chart 1: Monthly Reservations (Area Chart)
        const options1 = {
            series: [{
                name: 'Reservations',
                data: counts
            }],
            chart: {
                fontFamily: 'Inter, sans-serif',
                type: 'area',
                height: 350,
                toolbar: { show: false },
                zoom: { enabled: false },
                background: 'transparent'
            },
            colors: ['#14b8a6'],
            dataLabels: { enabled: false },
            stroke: { 
                curve: 'smooth', 
                width: 3 
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.1,
                }
            },
            xaxis: {
                categories: months,
                labels: {
                    style: {
                        colors: isDark ? '#9CA3AF' : '#6B7280',
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif',
                        fontWeight: 600
                    }
                },
                axisBorder: { show: false },
                axisTicks: { show: false },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: isDark ? '#9CA3AF' : '#6B7280',
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif',
                        fontWeight: 600
                    }
                }
            },
            grid: {
                borderColor: isDark ? '#374151' : '#E5E7EB',
                strokeDashArray: 5,
            },
            tooltip: { 
                theme: isDark ? 'dark' : 'light',
                style: {
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif'
                }
            }
        };

        const chart1 = new ApexCharts(document.querySelector("#reservationsChart"), options1);
        chart1.render();

        // Chart 2: Service Distribution (Donut Chart)
        const options2 = {
            series: typeCounts,
            labels: typeLabels,
            chart: {
                type: 'donut',
                height: 380,
            },
            colors: ['#14b8a6', '#06b6d4', '#3b82f6', '#8b5cf6'],
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                labels: {
                    colors: isDark ? '#9CA3AF' : '#6B7280',
                },
                fontFamily: 'Inter, sans-serif',
                fontWeight: 600,
                fontSize: '12px'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                fontSize: '16px',
                                fontFamily: 'Inter, sans-serif',
                                fontWeight: 900,
                                color: isDark ? '#fff' : '#111827'
                            },
                            value: {
                                fontSize: '24px',
                                fontFamily: 'Inter, sans-serif',
                                fontWeight: 900,
                                color: isDark ? '#fff' : '#111827'
                            }
                        }
                    }
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif',
                    fontWeight: 'bold'
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: { height: 300 },
                    legend: { position: 'bottom' }
                }
            }]
        };

        const chart2 = new ApexCharts(document.querySelector("#serviceTypeChart"), options2);
        chart2.render();
    });
</script>

@endsection
