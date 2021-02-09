<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = Auth::user();
        //dd($currentUser);
        if (isset($currentUser) && $currentUser->role_id === 2) {
            return response()->redirectToRoute('getAppealForm');
        } elseif (isset($currentUser) && $currentUser->role_id === 1) {
            return response()->redirectToRoute('getAdminPanel');
        }

        return response()->view('home');
    }
}
