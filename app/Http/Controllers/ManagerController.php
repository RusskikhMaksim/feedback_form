<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ManagerController extends UserController
{
    public function showAdminPanel()
    {
        $appeals = DB::table('user_appeals')
            ->where('is_reviewed', '=', '0')
            ->get();

        return view('admin_index', ['appeals' => $appeals]);
    }

    public function reviewAppeal(Request $request, $id)
    {

        DB::table('user_appeals')
            ->where('appeal_id', '=', "$id")
            ->update(['is_reviewed' => 1]);




        return response()->make('', 204);
    }

    public function showReviewedAppeals()
    {
        $appeals = DB::table('user_appeals')
            ->where('is_reviewed', '=', '1')
            ->get();

        return view('admin_reviewed', ['appeals' => $appeals]);
    }
}
