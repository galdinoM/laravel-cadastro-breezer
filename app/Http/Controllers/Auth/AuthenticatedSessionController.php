<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboard-admin');
        } else if (auth()->user()->role === 'user') {
            return redirect()->route('dashboard-user');
        }
        return redirect()->intended(RouteServiceProvider::HOME);

        $request->authenticate();

        $request->session()->regenerate();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            if (Auth::user()->is_admin) {
                return redirect()->route('dashboard-admin');
            } else {
                return redirect()->route('dashboard-user');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials or user does not have access permission.');
        }
    }

}
