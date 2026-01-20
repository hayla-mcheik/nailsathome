<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $path = $request->file('image')->store('about', 'public');
        
        AboutImage::create([
            'image' => $path
        ]);

        return back()->with('success', 'Image added to About section.');
    }

    public function destroy(AboutImage $aboutImage)
    {
        if ($aboutImage->image) {
            Storage::disk('public')->delete($aboutImage->image);
        }
        $aboutImage->delete();
        return back()->with('success', 'Image removed.');
    }
}