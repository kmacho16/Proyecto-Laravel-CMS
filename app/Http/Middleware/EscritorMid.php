<?php

namespace NewsGame\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;

use Closure;
use Flashy;

class EscritorMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->id_rol > 2){
            Flashy::message('Sin Persmisos suficientes');
            return redirect()->back();
        };
        return $next($request);
    }
}
