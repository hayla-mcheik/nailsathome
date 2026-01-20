<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpaTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SpaTreatmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/SpaTreatments/Index', [
            'treatments' => SpaTreatment::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'subtitle'        => 'required|string|max:255',
            'description'     => 'required|string',
            'duration'        => 'required|string|max:50',
            'price'           => 'required|numeric',
            'advance_booking' => 'boolean',
            'image'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('spa-treatments', 'public');
        }

        SpaTreatment::create($data);

        return back()->with('success', 'Spa Treatment added successfully.');
    }

    public function update(Request $request, SpaTreatment $spaTreatment)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'subtitle'        => 'required|string|max:255',
            'description'     => 'required|string',
            'duration'        => 'required|string|max:50',
            'price'           => 'required|numeric',
            'advance_booking' => 'boolean',
            'image'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($spaTreatment->image) {
                Storage::disk('public')->delete($spaTreatment->image);
            }
            $data['image'] = $request->file('image')->store('spa-treatments', 'public');
        }

        $spaTreatment->update($data);

        return back()->with('success', 'Treatment updated.');
    }

    public function destroy(SpaTreatment $spaTreatment)
    {
        if ($spaTreatment->image) {
            Storage::disk('public')->delete($spaTreatment->image);
        }
        $spaTreatment->delete();

        return back()->with('success', 'Treatment deleted.');
    }
}