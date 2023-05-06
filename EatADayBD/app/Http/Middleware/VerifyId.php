<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->id;
        if (!is_numeric($id) || $id < 0 || !($id/1 == $id)) {
            return response('Introduce un Id correcto', 422);
        }
        return $next($request);
    }
}
