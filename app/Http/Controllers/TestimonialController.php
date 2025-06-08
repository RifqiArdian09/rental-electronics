<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    // Tampilkan form testimoni
    public function create($rental_id)
    {
        $rental = Rental::where('id', $rental_id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        // Cek apakah sudah ada testimoni
        $existingTestimonial = Testimonial::where('rental_id', $rental_id)
                                          ->where('user_id', Auth::id())
                                          ->first();

        if ($existingTestimonial) {
            return redirect()->route('rental.history')
                             ->with('error', 'Anda sudah memberikan testimoni untuk penyewaan ini.');
        }

        return view('testimonials.create', compact('rental'));
    }

    // Simpan testimoni
    public function store(Request $request)
    {
        $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:500',
        ]);

        // Pastikan rental milik user yang login
        $rental = Rental::where('id', $request->rental_id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        // Cek duplikat testimoni
        $existingTestimonial = Testimonial::where('rental_id', $rental->id)
                                          ->where('user_id', Auth::id())
                                          ->first();

        if ($existingTestimonial) {
            return redirect()->route('rental.history')
                             ->with('error', 'Anda sudah memberikan testimoni untuk penyewaan ini.');
        }

        // Buat testimoni baru
        Testimonial::create([
            'rental_id' => $rental->id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        return redirect()->route('rental.history')
                         ->with('success', 'Terima kasih atas testimoni Anda!');
    }
}
