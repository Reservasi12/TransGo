@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Transport Services
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li class="font-medium text-blue-600">Services</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:px-7.5 xl:pb-1">
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-xl font-bold text-black dark:text-white">Services List</h4>
        <a href="{{ route('admin.transport-services.create') }}" class="inline-flex items-center justify-center rounded-md bg-blue-600 py-2 px-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-6 xl:px-6">
            Tambah Service  
        </a>
    </div>

    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-slate-700">
                    <th class="py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                        Gambar
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Nama Service
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Tipe
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Kapasitas
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Harga Tiket
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Jadwal
                    </th>
                     <th class="py-4 px-4 font-medium text-black dark:text-white">
                        fasilitas
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Status
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($transportServices as $service)
                <tr class="content-center">
                    <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-slate-700 xl:pl-11">
                        <div class="h-12 w-16 rounded-md overflow-hidden bg-gray-100">
                             @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Service" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-gray-200 text-gray-400">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <h5 class="font-medium text-black dark:text-white">{{ $service->name }}</h5>
                         <p class="text-sm text-gray-500">{{ $service->code }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white capitalize badge bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $service->type }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white">{{ $service->capacity }} Seats</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white font-bold text-orange-500">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500">Dep: <strong class="text-black dark:text-white font-medium">{{ \Carbon\Carbon::parse($service->departure_time)->format('H:i') }}</strong></span>
                            <span class="text-xs text-gray-500">Arr: <strong class="text-black dark:text-white font-medium">{{ \Carbon\Carbon::parse($service->arrival_time)->format('H:i') }}</strong></span>
                        </div>
                    </td>
                     <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-xs text-gray-500 truncate w-32" title="{{ $service->facilities }}">{{ $service->facilities ?? '-' }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ $service->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $service->is_active ? 'Available' : 'Unavailable' }}
                        </p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <div class="flex items-center space-x-3.5">
                            <a href="{{ route('admin.transport-services.edit', $service->id) }}" class="hover:text-blue-600">
                                <svg class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                            </a>
                            <form action="{{ route('admin.transport-services.destroy', $service->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:text-red-600">
                                    <svg class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
