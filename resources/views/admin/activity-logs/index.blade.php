@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Activity Logs
    </h2>
    <nav>
        <ol class="flex items-center gap-2">
            <li><a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a></li>
            <li class="font-medium text-blue-600">Activity Logs</li>
        </ol>
    </nav>
</div>

<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:px-7.5 xl:pb-1">
    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-slate-700">
                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                        User
                    </th>
                    <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                        Action
                    </th>
                     <th class="min-w-[200px] py-4 px-4 font-medium text-black dark:text-white">
                        Description
                    </th>
                     <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                        IP Address
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Time
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($activityLogs as $log)
                <tr class="content-center">
                    <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-slate-700 xl:pl-11">
                        <h5 class="font-medium text-black dark:text-white">{{ $log->user->name ?? 'System' }}</h5>
                         <p class="text-xs text-gray-500">{{ $log->user->role ?? '' }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ 
                            $log->action === 'create' ? 'bg-green-100 text-green-700' : 
                            ($log->action === 'update' ? 'bg-blue-100 text-blue-700' : 
                            ($log->action === 'delete' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700')) 
                        }}">
                            {{ ucfirst($log->action) }}
                        </span>
                    </td>
                     <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white">{{ $log->description }}</p>
                    </td>
                     <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white text-sm">{{ $log->ip_address ?? '-' }}</p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-slate-700">
                        <p class="text-black dark:text-white text-sm">{{ $log->created_at->diffForHumans() }}</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
     <!-- Pagination -->
    @if($activityLogs->hasPages())
        <div class="px-5 py-5 border-t border-[#eee] dark:border-slate-700">
            {{ $activityLogs->links() }}
        </div>
    @endif
</div>
@endsection
