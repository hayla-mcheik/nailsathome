<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransportationArea;
use Illuminate\Http\Request;

class TransportationFeeController extends Controller
{
    public function update(Request $request, TransportationArea $area)
    {
        $request->validate([
            'fee' => 'required|numeric|min:0'
        ]);

        // Updates the fee or creates it if it doesn't exist
        $area->fee()->updateOrCreate(
            ['transportation_area_id' => $area->id],
            ['fee' => $request->fee]
        );

        return back()->with('success', 'Transportation fee updated');
    }
}