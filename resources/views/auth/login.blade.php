<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TransGo') }} - Log In</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-slate-900 dark:bg-slate-900 dark:text-gray-200">
    <div class="flex h-screen items-center justify-center p-4">
        <div class="w-full max-w-lg rounded-sm border border-stroke bg-white shadow-default dark:border-slate-700 dark:bg-slate-800">
            <div class="p-6 sm:p-12">
                <div class="mb-8 flex items-center justify-center gap-3">
                     <span class="grid place-items-center w-10 h-10 rounded bg-blue-600 text-white font-bold text-xl">T</span>
                    <span class="text-2xl font-bold text-slate-800 dark:text-white">TransGo Admin</span>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Email</label>
                        <div class="relative">
                            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-blue-600 focus-visible:shadow-none dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" />
                            <span class="absolute right-4 top-4">
                                <svg class="fill-current w-5 h-5 opacity-50" viewBox="0 0 20 20">
                                    <path d="M2.00333 5.88355L9.99995 9.88186L17.9967 5.8835C17.9363 4.83315 17.0655 4 16 4H4C2.93452 4 2.06363 4.83318 2.00333 5.88355Z" />
                                    <path d="M18 8.1179L9.99995 12.1179L2 8.11796V14C2 15.1046 2.89543 16 4 16H16C17.1046 16 18 15.1046 18 14V8.1179Z" />
                                </svg>
                            </span>
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                         <label class="mb-2.5 block font-medium text-black dark:text-white">Password</label>
                         <div class="relative">
                            <input type="password" name="password" placeholder="Enter your password" required
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-blue-600 focus-visible:shadow-none dark:border-slate-600 dark:bg-slate-700 dark:focus:border-blue-500" />
                            <span class="absolute right-4 top-4">
                                <svg class="fill-current w-5 h-5 opacity-50" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="Sign In"
                            class="w-full cursor-pointer rounded-lg border border-blue-600 bg-blue-600 p-4 text-white transition hover:bg-opacity-90 font-medium" />
                    </div>

                    <div class="mt-6 text-center">
                        <p>
                            Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign Up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
