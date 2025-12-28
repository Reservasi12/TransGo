@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Create User
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li><a class="font-medium" href="{{ route('admin.users.index') }}">Users /</a></li>
            <li class="font-medium text-blue-600">Create</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
    <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
        <h3 class="font-medium text-black dark:text-white">
            User Form
        </h3>
    </div>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="p-6.5">
            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter user name"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Phone <span class="text-red-500">*</span>
                </label>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5">
                <label class="mb-2.5 block text-black dark:text-white">
                    Role <span class="text-red-500">*</span>
                </label>
                <div class="relative z-20 bg-transparent dark:bg-slate-700">
                    <select name="role" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                 @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password" placeholder="Enter password"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full xl:w-1/2">
                    <label class="mb-2.5 block text-black dark:text-white">
                        Re-type Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password_confirmation" placeholder="Re-enter password"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" required />
                </div>
            </div>

            <div class="mb-6">
                <label class="mb-2.5 block text-black dark:text-white">
                    Active Status
                </label>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600 rounded">
                    <span class="text-black dark:text-white">Active</span>
                </div>
            </div>

            <button class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-gray hover:bg-opacity-90">
                Create User
            </button>
        </div>
    </form>
</div>
@endsection
