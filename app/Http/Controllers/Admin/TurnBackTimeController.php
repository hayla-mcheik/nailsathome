<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TurnBackTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TurnBackTimeController extends Controller
{
      public function index()
    {
        return Inertia::render('Admin/TurnBackTime/Index', [
            
            'turnbacktime' => TurnBackTime::latest()->get()
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

        TurnBackTime::create($data);

        return back()->with('success', 'Spa Treatment added successfully.');
    }

    public function update(Request $request, TurnBackTime $turnbackTime)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'subtitle'        => 'nullable|string|max:255',
            'description'     => 'nullable|string',
            'duration'        => 'nullable|string|max:50',
            'price'           => 'nullable|numeric',
            'advance_booking' => 'boolean',
            'image'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($turnbackTime->image) {
                Storage::disk('public')->delete($turnbackTime->image);
            }
            $data['image'] = $request->file('image')->store('spa-treatments', 'public');
        }

        $turnbackTime->update($data);

        return back()->with('success', 'Treatment updated.');
    }

    public function destroy(TurnBackTime $turnbackTime)
    {
        if ($turnbackTime->image) {
            Storage::disk('public')->delete($turnbackTime->image);
        }
        $turnbackTime->delete();

        return back()->with('success', 'Treatment deleted.');
    }
}
