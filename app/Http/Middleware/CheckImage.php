<?php

namespace App\Http\Middleware;

use Closure;

class CheckImage
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
        $validatedData = $request->validate([
            'title' => ['required', 'min:3'],
        ]);
        if ($validatedData){

        } return $next($request);

    }
}
