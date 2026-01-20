<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Service, Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Services/Index', [
            'services' => Service::with('category')->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Services/Create', [
            'categories' => Category::all(),
        ]);
    }

// Admin/ServiceController.php

public function store(Request $request)
{
    $data = $request->validate([
        'name'        => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|max:2048',
        'vat_applicable' => 'boolean',
        'advance_booking' => 'boolean',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')
            ->store('services', 'public');
    }

    Service::create($data);

    return redirect()->route('admin.services.index')
        ->with('success', 'Service created successfully.');
}

    public function edit(Service $service)
    {
        return Inertia::render('Admin/Services/Edit', [
            'service'    => $service,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $request->file('image')
                ->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return back()->with('success', 'Service deleted successfully.');
    }
}
