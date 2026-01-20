<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrochureService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrochureServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Brochure/Index', [
            'services' => BrochureService::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_type' => 'required|string',
            'theme_color'   => 'required|string',
            'side_title'    => 'required|string',
            'section_title' => 'required|string',
            'title'         => 'required|string',
            'price'         => 'required|numeric',
            'duration'      => 'nullable|string',
            'description'   => 'nullable|string',
        ]);

        BrochureService::create($data);
        return back()->with('success', 'Service added to brochure.');
    }

    public function update(Request $request, BrochureService $brochureService)
    {
        $data = $request->validate([
            'category_type' => 'required|string',
            'theme_color'   => 'required|string',
            'side_title'    => 'required|string',
            'section_title' => 'required|string',
            'title'         => 'required|string',
            'price'         => 'required|numeric',
            'duration'      => 'nullable|string',
            'description'   => 'nullable|string',
        ]);

        $brochureService->update($data);
        return back()->with('success', 'Service updated.');
    }

    public function destroy(BrochureService $brochureService)
    {
        $brochureService->delete();
        return back()->with('success', 'Service removed.');
    }
}