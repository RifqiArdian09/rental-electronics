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
        'quantity' => 'required|integer|min:1|max:' . Tool::find($request->tool_id)->stock,
        'catatan' => 'nullable|string',
    ]);

    $tool = Tool::findOrFail($request->tool_id);

    // Kurangi stok
    $tool->stock -= $request->quantity;
    $tool->save();

    Rental::create([
        'tool_id' => $request->tool_id,
        'user_id' => Auth::guard('customer')->user()->id,
        'user_name' => Auth::guard('customer')->user()->name,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'quantity' => $request->quantity,
        'catatan' => $request->catatan,
        'payment_status' => 'unpaid',
        'is_returned' => false,
    ]);

    return redirect()->route('home')->with('success', 'Sewa berhasil dibuat!');
}

}
