@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Create Service
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li><a class="font-medium" href="{{ route('admin.transport-services.index') }}">Services /</a></li>
            <li class="font-medium text-blue-600">Create</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
    <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
        <h3 class="font-medium text-black dark:text-white">
            Service Form
        </h3>
    </div>
    <form action="{{ route('admin.transport-services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="p-6.5">
            <!-- Row 1: Basic Info -->
            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Service Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter service name"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Code <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="code" value="{{ old('code') }}" placeholder="e.g. BUS-001"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 2: Type & Capacity -->
            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Type <span class="text-red-500">*</span>
                    </label>
                    <div class="relative z-20 bg-transparent dark:bg-slate-700">
                        <select name="type" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">
                             <option value="">Select Type</option>
                             <option value="bus" {{ old('type') == 'bus' ? 'selected' : '' }}>Bus</option>
                             <option value="shuttle" {{ old('type') == 'shuttle' ? 'selected' : '' }}>Shuttle</option>
                             <option value="travel" {{ old('type') == 'travel' ? 'selected' : '' }}>Travel</option>
                        </select>
                    </div>
                    @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Capacity <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="capacity" value="{{ old('capacity') }}" placeholder="Number of seats"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('capacity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 3: Routes & Price -->
            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/3">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Route From <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="route_from" value="{{ old('route_from') }}" placeholder="e.g. Jakarta"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('route_from') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full xl:w-1/3">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Route To <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="route_to" value="{{ old('route_to') }}" placeholder="e.g. Bandung"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('route_to') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                 <div class="w-full xl:w-1/3">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Ticket Price (IDR) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="0"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 4: Schedule -->
             <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Departure Time <span class="text-red-500">*</span>
                    </label>
                    <input type="time" name="departure_time" value="{{ old('departure_time') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('departure_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Arrival Time <span class="text-red-500">*</span>
                    </label>
                    <input type="time" name="arrival_time" value="{{ old('arrival_time') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('arrival_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Description
                </label>
                <textarea rows="4" name="description" placeholder="Enter service description"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

             <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Facilities (Optional)
                </label>
                <textarea rows="2" name="facilities" placeholder="e.g. WiFi, AC, Snack"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">{{ old('facilities') }}</textarea>
                @error('facilities') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Service Image
                </label>
                <input type="file" name="image"
                    class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-medium outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:py-3 file:px-5 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:file:border-slate-600 dark:file:bg-white/30 dark:file:text-white dark:focus:border-blue-500" />
                 @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="mb-2.5 block text-black dark:text-white">
                    Available Status
                </label>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600 rounded">
                    <span class="text-black dark:text-white">Available</span>
                </div>
            </div>

            <button class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-gray hover:bg-opacity-90">
                Create Service
            </button>
        </div>
    </form>
</div>
@endsection
