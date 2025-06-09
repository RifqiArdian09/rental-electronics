<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('customer')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Anda berhasil login!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    public function showRegisterForm()
    {
        return view('auth.customer-register');
    }

    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:customers',
        'profession' => 'nullable|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $photoPath = null;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    }

    $customer = Customer::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'profession' => $validated['profession'] ?? null,
        'photo_url' => $photoPath,
        'password' => bcrypt($validated['password']),
    ]);

    Auth::guard('customer')->login($customer);

    return redirect(route('home'))->with('success', 'Pendaftaran berhasil! Selamat datang ' . $customer->name);
}


    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'))->with('success', 'Anda berhasil logout');
    }
}
