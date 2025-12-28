@extends('layouts.user')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        My Cancellations
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium text-black dark:text-white" href="{{ route('user.dashboard') }}">Dashboard /</a></li>
            <li class="font-medium text-blue-600">Cancellations</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:px-7.5 xl:pb-1">
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-xl font-bold text-black dark:text-white">Cancellation History</h4>
        <a href="{{ route('user.cancellations.create') }}" class="inline-flex items-center justify-center rounded-md bg-red-600 py-2 px-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-6 xl:px-6">
            Request Cancellation
        </a>
    </div>

    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-slate-700">
                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                        Reservation
                    </th>
                     <th class="min-w-[200px] py-4 px-4 font-medium text-black dark:text-white">
                        Reason
                    </th>
                    <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                        Status
                    </th>
                    <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                        Refund Amount
                    </th>
                     <th class="min-w-[200px] py-4 px-4 font-medium text-black dark:text-white">
                        Admin Note
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($cancellations as $reservation)
                <tr>
                    <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-slate-700 xl:pl-11">
                        <h5 class="font-medium text-black dark:text-white">{{ $reservation->booking_code }}</h5>
                        <p class="text-sm text-gray-500">{{ $reservation->transportService->name }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                         <p class="text-black dark:text-white truncate max-w-[200px]">{{ $reservation->cancellation->reason }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            $reservation->cancellation->status === 'approved' ? 'bg-green-100 text-green-700' : 
                            ($reservation->cancellation->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') 
                        }}">
                            {{ ucfirst($reservation->cancellation->status) }}
                        </span>
                    </td>
                     <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        @if($reservation->cancellation->refund_amount)
                            <p class="text-black dark:text-white">Rp {{ number_format($reservation->cancellation->refund_amount, 0, ',', '.') }}</p>
                        @else
                            <p class="text-gray-500">-</p>
                        @endif
                    </td>
                     <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $reservation->cancellation->admin_notes ?? '-' }}</p>
                    </td>
                </tr>
                @empty
                 <tr>
                    <td colspan="5" class="border-b border-[#eee] py-5 px-4 text-center dark:border-slate-700">
                        <p class="text-gray-500">No cancellation requests found.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
