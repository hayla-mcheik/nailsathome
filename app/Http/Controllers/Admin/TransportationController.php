<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransportationArea;
use Illuminate\Http\Request; // Ensure this is imported
use Inertia\Inertia;

class TransportationController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Transportation/Index', [
            'areas' => TransportationArea::with('fee')->get(),
        ]);
    }

    /**
     * Add a new transportation area and its initial fee.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:transportation_areas,name',
            'fee'  => 'required|numeric|min:0'
        ]);

        // 1. Create the Area
        $area = TransportationArea::create([
            'name' => $request->name
        ]);

        // 2. Create the associated Fee
        $area->fee()->create([
            'fee' => $request->fee
        ]);

        return back()->with('success', 'Transportation area added successfully.');
    }

    /**
     * Delete a transportation area.
     */
    public function destroy(TransportationArea $area)
    {
        // If your database has cascade delete, the fee will delete automatically.
        // Otherwise, delete the fee manually first:
        if ($area->fee) {
            $area->fee->delete();
        }
        
        $area->delete();

        return back()->with('success', 'Area deleted successfully.');
    }
}