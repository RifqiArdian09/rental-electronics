<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;

class HomeController extends Controller
{
    public function index()
    {
        $tools = Tool::with('category')->latest()->take(6)->get();
        return view('home', compact('tools'));
    }
}