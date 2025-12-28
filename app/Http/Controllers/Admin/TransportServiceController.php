<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransportService;
use App\Http\Requests\TransportServiceRequest;

class TransportServiceController extends Controller
{
    /**
     * Display a listing of the transport services.
     */
    public function index()
    {
        $transportServices = TransportService::orderBy('created_at', 'desc')->get();

        return view('admin.transport-services.index', compact('transportServices'));
    }

    /**
     * Show the form for creating a new transport service.
     */
    public function create()
    {
        return view('admin.transport-services.create');
    }

    /**
     * Store a newly created transport service in storage.
     */
    public function store(TransportServiceRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('transport-services', 'public');
            $validated['image'] = $imagePath;
        }

        TransportService::create($validated);

        return redirect()->route('admin.transport-services.index')
                         ->with('success', 'Transport service created successfully!');
    }

    /**
     * Show the form for editing the specified transport service.
     */
    public function edit(TransportService $transportService)
    {
        return view('admin.transport-services.edit', compact('transportService'));
    }

    /**
     * Update the specified transport service in storage.
     */
    public function update(TransportServiceRequest $request, TransportService $transportService)
    {
        $validated = $request->validated();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($transportService->image) {
                \Storage::disk('public')->delete($transportService->image);
            }

            $imagePath = $request->file('image')->store('transport-services', 'public');
            $validated['image'] = $imagePath;
        }

        $transportService->update($validated);

        return redirect()->route('admin.transport-services.index')
                         ->with('success', 'Transport service updated successfully!');
    }
    /**
     * Remove the specified transport service from storage.
     */
    public function destroy(TransportService $transportService)
    {
        // Delete image if exists
        if ($transportService->image) {
            \Storage::disk('public')->delete($transportService->image);
        }

        $transportService->delete();

        return redirect()->route('admin.transport-services.index')
                         ->with('success', 'Transport service deleted successfully!');
    }
}
