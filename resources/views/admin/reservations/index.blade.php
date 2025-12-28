@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Reservations
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li class="font-medium text-blue-600">Reservations</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:px-7.5 xl:pb-1">
    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-slate-700">
                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                        Customer
                    </th>
                    <th class="min-w-[180px] py-4 px-4 font-medium text-black dark:text-white">
                        Service
                    </th>
                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                        Tanggal Reservasi
                    </th>
                     <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                        Total Harga
                    </th>
                    <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                        Status
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr class="content-center">
                    <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-slate-700 xl:pl-11">
                        <h5 class="font-medium text-black dark:text-white">{{ $reservation->user->name }}</h5>
                        <p class="text-sm text-gray-500">{{ $reservation->user->email }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                         <h5 class="font-medium text-black dark:text-white">{{ $reservation->transportService->name }}</h5>
                         <p class="text-sm capitalize">{{ $reservation->transportService->type }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white font-medium">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }}</p>
                        <p class="text-xs text-gray-500">Keberangkatan</p>
                    </td>
                     <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white">Rp {{ number_format($reservation->total_price, 0, ',', '.') }}</p>
                    </td>
                     <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                         <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            $reservation->booking_status === 'confirmed' ? 'bg-green-100 text-green-700' : 
                            ($reservation->booking_status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                            ($reservation->booking_status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700')) 
                        }}">
                            {{ ucfirst($reservation->booking_status) }}
                        </span>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                         <div class="flex items-center space-x-3.5">
                            <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="hover:text-blue-600">
                                <svg class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
