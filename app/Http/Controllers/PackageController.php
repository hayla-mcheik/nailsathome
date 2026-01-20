<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function index()
    {
        return Inertia::render('Packages/Index', [
            'packages' => Package::with('services.variants')->get()
        ]);
    }

    public function show($id)
    {
        $package = Package::with('services.variants')->findOrFail($id);

        return Inertia::render('Packages/Show', [
            'package' => $package
        ]);
    }
}
