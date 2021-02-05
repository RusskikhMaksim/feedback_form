<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

            return response()->redirectToRoute('getAppealForm');
        }

        return back()->withErrors([
            'sorry' => 'The provided credentials do not match our records',
        ]);
    }
}
