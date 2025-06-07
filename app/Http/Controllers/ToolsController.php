<?php

namespace App\Http\Controllers;

use App\Models\Tool;

class ToolsController extends Controller
{
    public function index()
    {
        // Ambil semua tools sekaligus relasi category-nya
        $tools = Tool::with('category')->get();

        // Kirim data tools ke view landing.blade.php
        return view('home', compact('tools'));
    }
}
