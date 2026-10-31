<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form.
     * Always displays the Login page first.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('rooms.index')->with('success', 'ស្វាគមន៍ការត្រឡប់មកវិញ! ការចូលប្រើបានជោគជ័យ (Login successful).');
        }

        return back()->withErrors([
            'email' => 'អ៊ីមែល ឬពាក្យសម្ងាត់មិនត្រឹមត្រូវទេ (Invalid credentials).',
        ])->onlyInput('email');
    }

    /**
     * Show the register form.
     */
    public function showRegisterForm()
    {
        return view('register');
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('rooms.index')->with('success', 'ការចុះឈ្មោះគណនីបានជោគជ័យ! សូមស្វាគមន៍មកកាន់ប្រព័ន្ធគ្រប់គ្រងផ្ទះសំណាក់ ចាន់ថន។');
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'អ្នកបានចាកចេញពីប្រព័ន្ធដោយសុវត្ថិភាព (Logged out successfully).');
    }
}
