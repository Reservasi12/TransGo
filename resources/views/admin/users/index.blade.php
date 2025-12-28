@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Users Management
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li class="font-medium text-blue-600">Users</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:px-7.5 xl:pb-1">
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-xl font-bold text-black dark:text-white">Users List</h4>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center rounded-md bg-blue-600 py-2 px-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-6 xl:px-6">
            Add User
        </a>
    </div>

    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-slate-700">
                    <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                        Name
                    </th>
                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                        Role
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
                @foreach($users as $user)
                <tr class="content-center">
                    <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-slate-700 xl:pl-11">
                        <h5 class="font-medium text-black dark:text-white">{{ $user->name }}</h5>
                        <p class="text-sm">{{ $user->email }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white capitalize">{{ $user->role }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ $user->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <div class="flex items-center space-x-3.5">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="hover:text-blue-600">
                                <svg class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
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
