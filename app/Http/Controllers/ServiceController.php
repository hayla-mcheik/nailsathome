<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Services/Index', [
            'categories' => Category::with([
                'services.variants'
            ])->orderBy('sort_order')->get()
        ]);
    }

    public function show($id)
    {
        $service = \App\Models\Service::with('variants', 'category')->findOrFail($id);

        return Inertia::render('Services/Show', [
            'service' => $service
        ]);
    }
}
