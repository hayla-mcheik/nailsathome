<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FAQController extends Controller
{
        public function index()
    {
        $faq = FAQ::all();
        return Inertia::render('Admin/FAQ/Index', compact('faq'));
    }

    public function create()
    {
        return Inertia::render('Admin/FAQ/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

     

        FAQ::create($data);

        return redirect()->route('admin.faq.index')
            ->with('success', 'Faq created successfully.');
    }

    public function edit(FAQ $faq)
    {
        return Inertia::render('Admin/FAQ/Edit', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

  
        $faq->update($data);

        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ deleted successfully.');
    }
}
