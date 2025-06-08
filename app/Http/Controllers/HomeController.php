<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Rental;
use App\Models\Customer;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 tool terbaru dengan relasi category
        $tools = Tool::with('category')->latest()->take(6)->get();

        // Ambil 3 testimoni terbaru yang sudah disetujui (is_approved = true) dengan relasi user
        $testimonials = Testimonial::with('user')
            ->where('is_approved', true)
            ->latest()
            ->take(3)
            ->get();

        // Statistik
        $totalTools = Tool::count();
        $totalCustomers = Customer::count();
        $totalRentals = Rental::count();
        $satisfaction = Testimonial::where('is_approved', true)->avg('rating');
        $satisfaction = round($satisfaction * 20); // Misal rating dari 1–5 diubah ke persen
        
        return view('home', compact(
            'tools',
            'testimonials',
            'totalTools',
            'totalCustomers',
            'totalRentals',
            'satisfaction'
        ));
    }
}
