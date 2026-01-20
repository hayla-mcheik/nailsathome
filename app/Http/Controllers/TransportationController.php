<?php

namespace App\Http\Controllers;

use App\Models\TransportationArea;
use Inertia\Inertia;

class TransportationController extends Controller
{
    public function index()
    {
        return Inertia::render('Transportation/Index', [
            'areas' => TransportationArea::with('fee')->orderBy('name')->get()
        ]);
    }
}
