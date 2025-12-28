@extends('layouts.user')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        My Profile
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium text-black dark:text-white" href="{{ route('user.dashboard') }}">Dashboard /</a></li>
            <li class="font-medium text-blue-600">Profile</li>
        </ol>
    </nav>
</div>

<div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
    <!-- Profile Form -->
    <div class="flex flex-col gap-9 sm:col-span-2 lg:col-span-1">
        <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Update Profile
                </h3>
            </div>
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    <!-- Personal Info Section -->
                    <div class="mb-5 border-b border-stroke pb-5 dark:border-slate-700">
                        <h4 class="mb-4 text-xl font-semibold text-black dark:text-white">Personal Information</h4>
                        
                        <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Nama <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter your full name"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                             @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter your email"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                             @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                         <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Enter your phone number"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                             @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="mb-5">
                        <h4 class="mb-4 text-xl font-semibold text-black dark:text-white">Change Password</h4>
                        <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">Biarkan kosong jika tidak ingin mengubah password.</p>

                        <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Current Password
                            </label>
                            <input type="password" name="current_password" placeholder="Enter current password"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" />
                             @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                         <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                New Password
                            </label>
                            <input type="password" name="new_password" placeholder="Enter new password"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" />
                             @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Confirm New Password
                            </label>
                            <input type="password" name="new_password_confirmation" placeholder="Re-enter new password"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" />
                        </div>
                    </div>

                    <button class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-gray hover:bg-opacity-90">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- User Info Card -->
    <div class="flex flex-col gap-9 sm:col-span-2 lg:col-span-1">
         <div class="rounded-sm border border-stroke bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-slate-700">
                <h3 class="font-medium text-black dark:text-white">
                    Profile
                </h3>
            </div>
            <div class="p-6.5">
                <div class="mb-4 flex flex-col items-center">
                    <div class="h-30 w-30 rounded-full bg-gray-200 overflow-hidden mb-4">
                        <svg class="h-full w-full text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                    <h4 class="mb-1 text-2xl font-bold text-black dark:text-white">
                        {{ $user->name }}
                    </h4>
                    <p class="font-medium text-gray-500 dark:text-white">
                        {{ ucfirst($user->role) }}
                    </p>
                </div>
                
                 <div class="mt-4">
                    <h5 class="font-bold text-black dark:text-white mb-2">Detail Akun</h5>
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between border-b border-stroke py-2 dark:border-slate-700">
                            <span class="font-medium text-black dark:text-white">Tanggal Bergabung</span>
                            <span class="text-gray-500 dark:text-white">{{ $user->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between border-b border-stroke py-2 dark:border-slate-700">
                            <span class="font-medium text-black dark:text-white">Nomor Telepon</span>
                            <span class="text-gray-500 dark:text-white">{{ $user->phone ?? '-' }}</span>
                        </div>
                         <div class="flex justify-between py-2">
                            <span class="font-medium text-black dark:text-white">Total Reservasi</span>
                            <span class="text-gray-500 dark:text-white">{{ $user->reservations->count() }}</span>
                        </div>
                    </div>
                 </div>
            </div>
         </div>
    </div>
</div>
@endsection
