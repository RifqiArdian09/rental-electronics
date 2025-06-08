<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\Category;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    /**
     * Tampilkan semua produk
     */
    public function index(Request $request)
    {
        $query = Tool::with(['category', 'testimonials'])
                    ->withAvg('testimonials as average_rating', 'rating');

        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $tools = $query->latest()->paginate(9);
        $categories = Category::all();

        return view('tools.index', compact('tools', 'categories'));
    }

    /**
     * Fitur pencarian produk berdasarkan nama atau deskripsi
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $tools = Tool::with(['category', 'testimonials'])
            ->withAvg('testimonials as average_rating', 'rating')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                  ->orWhere('description', 'like', "%$query%");
            })
            ->latest()
            ->paginate(9);

        $categories = Category::all();

        return view('tools.index', compact('tools', 'categories'));
    }

    /**
     * Tampilan cepat produk
     */
    public function quickview($id)
    {
        $tool = Tool::with(['category', 'testimonials.user'])
                  ->withAvg('testimonials as average_rating', 'rating')
                  ->findOrFail($id);
        
        return view('tools.quickview', compact('tool'));
    }
}