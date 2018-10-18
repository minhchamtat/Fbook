<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            $roles = Auth::user()->roles;
            if ($roles->count() > 0) {
                if ($roles->count() > 1) {
                    foreach ($roles as $role) {
                        if ($role->name == config('view.role.admin') || $role->name == config('view.role.editor')) {
                            return $next($request);
                        }
                    }
                } elseif ($roles[0]->name == config('view.role.admin')
                    || $roles[0]->name == config('view.role.editor')) {
                    return $next($request);
                }
            }
        }

        return redirect('/');
    }
}
