<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandsController extends Controller
{
        public function index()
    {
        $brands = Brands::all();
        return Inertia::render('Admin/Brands/Index', compact('brands'));
    }

    public function create()
    {
        return Inertia::render('Admin/Brands/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('brands', 'public');
        }

        Brands::create($data);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brands created successfully.');
    }

    public function edit(Brands $brands)
    {
        return Inertia::render('Admin/Brands/Edit', compact('brands'));
    }

    public function update(Request $request, Brands $brands)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('brands', 'public');
        }

        $brands->update($data);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brands updated successfully.');
    }

    public function destroy(Brands $brands)
    {
        $brands->delete();
        return redirect()->route('admin.brands.index')
            ->with('success', 'Brands deleted successfully.');
    }
}
