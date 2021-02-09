<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $clientData = $request->only(['email', 'password']);

        if (Auth::attempt($clientData)) {
            $request->session()->regenerate();

            $currentUser = Auth::user();
            if ($currentUser->role_id === 2) {
                return response()->redirectToRoute('getAppealForm');
            } elseif ($currentUser->role_id === 1) {
                return response()->redirectToRoute('getAdminPanel');
            }
        }

        return back()->withErrors([
            'sorry' => 'The provided credentials do not match our records',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->redirectToRoute('home');
    }
}
