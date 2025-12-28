@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Cancellation Request
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li><a class="font-medium" href="{{ route('admin.cancellations.index') }}">Cancellations /</a></li>
            <li class="font-medium text-blue-600">Details</li>
        </ol>
    </nav>
</div>

<div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
    <!-- Cancellation Details -->
    <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Request Details
                </h3>
            </div>
            <div class="p-6.5">
               <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Customer</label>
                    <p class="text-gray-600 dark:text-gray-400">{{ $cancellation->reservation->user->name }}</p>
                </div>
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Reservation ID</label>
                    <p class="text-gray-600 dark:text-gray-400">#{{ $cancellation->reservation_id }}</p>
                </div>
                <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Total Price</label>
                    <p class="text-gray-600 dark:text-gray-400">Rp {{ number_format($cancellation->reservation->total_price, 0, ',', '.') }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Reason</label>
                    <p class="text-gray-600 dark:text-gray-400 p-4 bg-gray-50 rounded border border-gray-100 dark:bg-slate-700 dark:border-slate-600">{{ $cancellation->reason }}</p>
                </div>
                 <div class="mb-4.5">
                    <label class="mb-2.5 block text-black dark:text-white font-medium">Current Status</label>
                     <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            $cancellation->status === 'approved' ? 'bg-green-100 text-green-700' : 
                            ($cancellation->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') 
                        }}">
                            {{ ucfirst($cancellation->status) }}
                        </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Process Form -->
    <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
             <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Process Request
                </h3>
            </div>
             <form action="{{ route('admin.cancellations.update', $cancellation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Action
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-slate-700">
                            <select name="status" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">
                                <option value="pending" {{ $cancellation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $cancellation->status == 'approved' ? 'selected' : '' }}>Approve (Refund)</option>
                                <option value="rejected" {{ $cancellation->status == 'rejected' ? 'selected' : '' }}>Reject</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Refund Amount (IDR)
                        </label>
                        <input type="number" name="refund_amount" value="{{ old('refund_amount', $cancellation->refund_amount) }}" placeholder="0"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" />
                    </div>

                    <div class="mb-6">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Admin Notes
                        </label>
                        <textarea rows="4" name="admin_notes" placeholder="Internal notes..."
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">{{ old('admin_notes', $cancellation->admin_notes) }}</textarea>
                    </div>

                    <button class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-gray hover:bg-opacity-90">
                        Update Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
