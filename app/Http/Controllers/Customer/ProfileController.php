<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::guard('customer')->user();
        return view('customer.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $user->id,
            'profession' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo_url) {
                Storage::delete('public/' . $user->photo_url);
            }

            $path = $request->file('photo')->store('customers', 'public');
            $user->photo_url = $path;
        }

        $user->update($request->only('name', 'email', 'profession'));

        return redirect()->route('customer.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    public function index()
    {
        $user = Auth::guard('customer')->user();
        return view('customer.profile.index', compact('user'));
    }
}
