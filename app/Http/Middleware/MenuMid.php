<?php

namespace NewsGame\Http\Middleware;

use Closure;
use Menu;
use Caffeinated\Menus\Builder;

class MenuMid
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
         Menu::make('miMenu', function(Builder $menu) {
            $menu->add('Home', url('/'))->active(url('/'));
            $menu->add('Horror', url('/categorias/horror'))->active(url('/categorias/horror'));
            $menu->horror->add('Primer Post',url('/post/primer-post'));
            $menu->horror->add('Primer escrito',url('/post/primer-escritor'));
            $menu->add('Blog', '/blog');
            $menu->add('Contact Me', '/contact-me');
        });

        return $next($request);
    }
}
