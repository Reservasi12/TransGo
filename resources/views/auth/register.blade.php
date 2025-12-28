<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TailAdmin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-slate-900">
    <div class="flex min-h-screen items-center justify-center p-4">
        <!-- Register Card -->
        <div class="w-full max-w-lg rounded-sm border border-stroke bg-white shadow-default dark:border-slate-700 dark:bg-slate-800">
            <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                <span class="mb-1.5 block font-medium text-center text-title-md2 text-blue-600">TailAdmin</span>
                <h2 class="mb-9 text-2xl font-bold text-black dark:text-white text-center sm:text-title-xl2">
                    Sign Up to Get Started
                </h2>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">
                            Name
                        </label>
                        <div class="relative">
                            <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-blue-600 focus-visible:shadow-none dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                            @error('name')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">
                            Email
                        </label>
                        <div class="relative">
                            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-blue-600 focus-visible:shadow-none dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                             @error('email')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">
                            Phone Number
                        </label>
                        <div class="relative">
                            <input type="text" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-blue-600 focus-visible:shadow-none dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                             @error('phone')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" name="password" placeholder="Enter password"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-blue-600 focus-visible:shadow-none dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                             @error('password')
                                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" placeholder="Re-enter password"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-blue-600 focus-visible:shadow-none dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-500" required />
                        </div>
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="Sign Up"
                            class="w-full cursor-pointer rounded-lg border border-blue-600 bg-blue-600 p-4 text-white transition hover:bg-opacity-90" />
                    </div>

                    <div class="mt-6 text-center">
                        <p class="font-medium text-gray-500 dark:text-gray-400">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                                Sign in
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
