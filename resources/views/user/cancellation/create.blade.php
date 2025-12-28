@extends('layouts.user')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Request Cancellation
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium text-black dark:text-white" href="{{ route('user.dashboard') }}">Dashboard /</a></li>
            <li><a class="font-medium text-black dark:text-white" href="{{ route('user.cancellations.index') }}">Cancellations /</a></li>
            <li class="font-medium text-blue-600">Create</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
    <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
        <h3 class="font-medium text-black dark:text-white">
            Cancellation Form
        </h3>
    </div>
    <form action="{{ route('user.cancellations.store') }}" method="POST">
        @csrf
        <div class="p-6.5">
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Select Reservation <span class="text-red-500">*</span>
                </label>
                <div class="relative z-20 bg-transparent dark:bg-slate-700">
                    <select name="reservation_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required>
                        <option value="" disabled selected>Select a booking to cancel</option>
                        @foreach($reservations as $reservation)
                            <option value="{{ $reservation->id }}">
                                {{ $reservation->booking_code }} - {{ $reservation->transportService->name }} ({{ $reservation->start_date }})
                            </option>
                        @endforeach
                    </select>
                     <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                        </svg>
                    </span>
                </div>
                 @if($reservations->isEmpty())
                    <p class="text-sm text-red-500 mt-2">You have no eligible reservations to cancel.</p>
                @endif
            </div>

            <div class="mb-6">
                <label class="mb-2.5 block text-black dark:text-white">
                    Reason for Cancellation <span class="text-red-500">*</span>
                </label>
                <textarea rows="6" name="reason" placeholder="Please explain why you want to cancel..."
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required></textarea>
            </div>

            <button class="flex w-full justify-center rounded bg-red-600 p-3 font-medium text-gray hover:bg-opacity-90">
                Submit Request
            </button>
        </div>
    </form>
</div>
@endsection
