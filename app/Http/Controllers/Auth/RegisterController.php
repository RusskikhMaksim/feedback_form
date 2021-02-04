<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        //dd($request);
        $request->validate([
           'name' => ['required'],
           'email' => ['required'],
           'password' => ['required'],
           'confirm_password' => ['required', 'same:password'],
        ]);
        /*
        $attributes = [
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password,
        ];*/

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        $user->role_id = 2;
        $user->save();

        return response()->redirectToRoute('home');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
