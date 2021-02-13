<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckRole
{
    private const ROLES = [1, 2];

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

        $role = $this->getRole();
        if (!in_array($role, self::ROLES)) {
            return route('home');
        }

        $request->merge(['role_id' => $role]);

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
