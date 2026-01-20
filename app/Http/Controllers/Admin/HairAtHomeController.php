<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HairAtHome;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HairAtHomeController extends Controller
{
    /**
     * Display a listing of the hair services.
     */
    public function index()
    {
        return Inertia::render('Admin/HairAtHome/Index', [
            'services' => HairAtHome::latest()->get()
        ]);
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_group' => 'required|string|max:255',
            'service_name'   => 'required|string|max:255',
            'duration'       => 'nullable|string|max:255',
            'price_standard' => 'nullable|string|max:255',
            'price_majirel'  => 'nullable|string|max:255',
            'price_inoa'     => 'nullable|string|max:255',
            'description'    => 'nullable|string',
        ]);

        HairAtHome::create($validated);

        return back()->with('success', 'Hair service added successfully.');
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, HairAtHome $hairAtHome)
    {
        $validated = $request->validate([
            'category_group' => 'required|string|max:255',
            'service_name'   => 'required|string|max:255',
            'duration'       => 'nullable|string|max:255',
            'price_standard' => 'nullable|string|max:255',
            'price_majirel'  => 'nullable|string|max:255',
            'price_inoa'     => 'nullable|string|max:255',
            'description'    => 'nullable|string',
        ]);

        $hairAtHome->update($validated);

        return back()->with('success', 'Hair service updated successfully.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(HairAtHome $hairAtHome)
    {
        $hairAtHome->delete();

        return back()->with('success', 'Service deleted successfully.');
    }
}