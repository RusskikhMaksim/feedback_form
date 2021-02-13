<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function showRegistrationForm(): Response
    {
        return response()->view('registration');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
           'name' => ['required'],
           'email' => ['required'],
           'password' => ['required'],
           'confirm_password' => ['required', 'same:password'],
        ]);

        User::create($request->all());

        return response()->redirectToRoute('home');
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
