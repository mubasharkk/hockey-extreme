<?php
namespace App\Http\Middleware;

use Closure;
use Xinax\LaravelGettext\Facades\LaravelGettext;

class SiteLocale
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     */
    public function handle($request, Closure $next, $guard = null)
    {
        \View::share('locale', LaravelGettext::getLocale());

        return $next($request);
    }
}