<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Service, ServiceVariant};
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceVariantController extends Controller
{
    public function index(Service $service)
    {
        return Inertia::render('Admin/ServiceVariants/Index', [
            'service'  => $service,
            'variants' => $service->variants
        ]);
    }

    public function store(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'duration'        => 'required|integer',
            'price'           => 'required|numeric',
            'price_secondary' => 'nullable|numeric',
            'unit'            => 'nullable|string',
        ]);

        $service->variants()->create($data);

        return back()->with('success', 'Variant added');
    }

    public function destroy(ServiceVariant $variant)
    {
        $variant->delete();
        return back()->with('success', 'Variant deleted');
    }
}
