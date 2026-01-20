<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Category,
    Service,
    Package,
    TransportationArea
};
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'categories' => Category::count(),
                'services' => Service::count(),
                'packages' => Package::count(),
                'areas' => TransportationArea::count(),
            ]
        ]);
    }
}
