<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutImage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/About/Index', [
            'about' => About::first() ?? ['title' => '', 'description' => ''],
            'images' => AboutImage::all()
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $about = About::firstOrCreate(['id' => 1]);
        $about->update($data);

        return back()->with('success', 'About content updated successfully.');
    }
}