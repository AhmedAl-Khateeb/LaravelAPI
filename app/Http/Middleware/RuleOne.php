<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuleOne
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rules != 1) {
            return redirect()->route("drive.notFound");
        } else {
            return $next($request);
        }


    }
}
