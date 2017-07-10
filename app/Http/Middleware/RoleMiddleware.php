<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;

class RoleMiddleware {

    public function handle($request, Closure $next, $role, $permission)
    {
        //dd($request->user());
        if (Auth::guest()) {
          if ($request->ajax()) {
            return response('Unauthorized.', 401);
          } else {
            //return Redirect::to('/login');
            //return Redirect::to(config('url'));
            return redirect('login');
          }
        }

        if (! $request->user()->hasRole($role)) {
           abort(403);
        }

        if (! $request->user()->can($permission)) {
           abort(403);
        }

        return $next($request);
    }

}
