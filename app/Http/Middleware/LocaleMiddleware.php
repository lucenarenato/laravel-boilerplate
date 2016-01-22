<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class LocaleMiddleware
 * @package App\Http\Middleware
 */
class LocaleMiddleware
{
    /**
     * Add your language code to this array.
     * The code must have the same name as the language folder.
     * Be sure to add the new language in an alphabetical order.
     * @var array
     */
    protected $languages = ['en', 'es', 'fr', 'it', 'pt-BR', 'sv'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale') && in_array(session()->get('locale'), $this->languages)) {
            app()->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
