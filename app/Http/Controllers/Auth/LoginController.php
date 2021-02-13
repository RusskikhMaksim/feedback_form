<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(): Response
    {
        return response()->view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $clientData = $request->only(['email', 'password']);

        if (Auth::attempt($clientData)) {
            $request->session()->regenerate();

            $role_id = $this->getRole();

            if ($role_id === 2) {
                return response()->redirectToRoute('getAppealForm');
            } elseif ($role_id === 1) {
                return response()->redirectToRoute('getAdminPanel');
            }
        }

        return back()->withErrors([
            'sorry' => 'The provided credentials do not match our records',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->redirectToRoute('home');
    }
}
