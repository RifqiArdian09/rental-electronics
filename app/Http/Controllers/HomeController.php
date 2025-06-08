<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Testimonial;

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

        // Kirim data ke view 'home'
        return view('home', compact('tools', 'testimonials'));
    }
}
