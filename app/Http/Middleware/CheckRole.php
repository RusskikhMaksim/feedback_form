<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function getRole(): ?int
    {
        $currentUser = Auth::id();

        $collection = User::where('id', '=', "$currentUser")->get('role_id');

        if (isset($collection[0])) {
            return $collection[0]->role_id;
        }

        return null;
    }
}
