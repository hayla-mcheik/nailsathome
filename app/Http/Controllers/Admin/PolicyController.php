<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PolicyController extends Controller
{
    public function index() {
    return Inertia::render('Admin/Policies/Index', [
        'policies' => Policy::orderBy('sort_order')->get()
    ]);
}

public function store(Request $request) {
    $validated = $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
    ]);
    Policy::create($validated);
    return back();
}
// Add update and destroy methods similarly...
}
