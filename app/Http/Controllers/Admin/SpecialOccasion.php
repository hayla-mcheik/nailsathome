<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SpecialOccasion extends Controller
{
        public function index()
    {
        return Inertia::render('Admin/SpecialOccasion/Index', [
            'specialoccasion' => \App\Models\SpecialOccasion::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'image'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('specialoccasion', 'public');
        }

        \App\Models\SpecialOccasion::create($data);

        return back()->with('success', 'Special Occasion added successfully.');
    }

    public function update(Request $request, \App\Models\SpecialOccasion $specialoccasion)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'image'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($specialoccasion->image) {
                Storage::disk('public')->delete($specialoccasion->image);
            }
            $data['image'] = $request->file('image')->store('specialoccasion', 'public');
        }

        $specialoccasion->update($data);

        return back()->with('success', 'Special Occasion updated.');
    }

    public function destroy(\App\Models\SpecialOccasion $specialoccasion)
    {
        if ($specialoccasion->image) {
            Storage::disk('public')->delete($specialoccasion->image);
        }
        $specialoccasion->delete();

        return back()->with('success', 'Special Occasion deleted.');
    }
}
