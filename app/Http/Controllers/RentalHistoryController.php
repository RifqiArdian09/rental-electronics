<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;

class RentalHistoryController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('tool')
            ->where('user_id', Auth::guard('customer')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('rental.history', compact('rentals'));
    }
}
