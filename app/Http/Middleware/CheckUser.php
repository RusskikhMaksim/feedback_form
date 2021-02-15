<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser extends CheckRole
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
}
