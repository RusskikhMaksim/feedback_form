<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin extends CheckRole
{
    private const ROLE = 1;

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
        if ($role !== self::ROLE) {
            return route('home');
        }

        $request->merge(['role_id' => $role]);

        return $next($request);
    }
}
