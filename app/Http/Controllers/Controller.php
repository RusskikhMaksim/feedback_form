<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRole(): ?int
    {
        $currentUser = Auth::id();

        $collection = User::select('role_id')
            ->where('id', '=', "$currentUser")
            ->get();

        if (isset($collection[0])) {
            return $collection[0]->role_id;
        }


        return null;
    }
}
