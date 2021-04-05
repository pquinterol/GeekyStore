<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('applocate')){
            $configLanguage = config('languages')[session('applocate')];
            setlocale(LC_TIME , $configLanguage[1] . '.utf8');
            Carbon::setlocale(session('applocate'));
            App::setlocale(session('applocate'));
        }else{
            session()->put('applocate', config('app.fallback_locale'));
            setLocale(LC_TIME, 'es_ES.utf8');
            Carbon::setlocale(session('applocate'));
            App::setlocale(config('app.falback_locale'));
        }

        return $next($request);
    }
}
