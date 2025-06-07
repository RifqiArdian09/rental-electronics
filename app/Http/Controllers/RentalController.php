<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function create($toolId)
    {
        $tool = Tool::findOrFail($toolId);
        return view('rental.create', compact('tool'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tool_id' => 'required|exists:tools,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'catatan' => 'nullable|string',
        ]);

        Rental::create([
            'tool_id' => $request->tool_id,
            'user_name' => Auth::guard('customer')->user()->name, // Ambil nama customer
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'catatan' => $request->catatan,
            'payment_status' => 'unpaid', // GANTI INI
        ]);

        return redirect()->route('home')->with('success', 'Sewa berhasil dibuat!');
    }
}
