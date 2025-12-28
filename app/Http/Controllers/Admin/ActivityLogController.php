<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the activity logs.
     */
    public function index()
    {
        $activityLogs = ActivityLog::with('user')
                                 ->orderBy('created_at', 'desc')
                                 ->paginate(20);

        return view('admin.activity-logs.index', compact('activityLogs'));
    }
}
