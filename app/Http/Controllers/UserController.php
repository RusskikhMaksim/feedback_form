<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private const ADMIN_ROLE_ID = 1;

    private const USER_ROLE_ID = 2;

    /**
     * @return RedirectResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = $this->getRole();
        if ($role_id === self::USER_ROLE_ID) {
            return response()->redirectToRoute('getAppealForm');
        } elseif ($role_id === self::ADMIN_ROLE_ID) {
            return response()->redirectToRoute('getAdminPanel');
        }

        return response()->view('home');
    }
}
