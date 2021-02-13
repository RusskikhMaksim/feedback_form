<?php

namespace App\Http\Controllers;

use App\Models\UserAppeal;
use Illuminate\Http\Response;

class ManagerController extends UserController
{
    private const REVIEWED = 1;

    private const NOT_REVIEWED = 0;

    public function showAdminPanel(): Response
    {
        $appeals = UserAppeal::where('is_reviewed', '=', self::NOT_REVIEWED)->get();

        return response()->view('admin_index', ['appeals' => $appeals]);
    }

    public function reviewAppeal(int $id): Response
    {
        UserAppeal::where('appeal_id', '=', "$id")->update(['is_reviewed' => self::REVIEWED]);

        return response()->make('', 204);
    }

    public function showReviewedAppeals(): Response
    {
        $appeals = UserAppeal::where('is_reviewed', '=', self::REVIEWED)->get();

        return response()->view('admin_reviewed', ['appeals' => $appeals]);
    }
}
