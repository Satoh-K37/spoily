<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToHttps
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
        if (!$this->is_ssl() && config('app.env') === 'production') {
            return redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); 
        }
        return $next($request);
    }

    //Webサーバー毎にキーと値で判別
    public function is_ssl()
    {
        // Nginx
        if (isset($_SERVER['HTTPS']) === true) { 
            return ($_SERVER['HTTPS'] === 'on' or $_SERVER['HTTPS'] === '1');
        }
        // IIS
        elseif (isset($_SERVER['SSL']) === true) { 
            return ($_SERVER['SSL'] === 'on');
        }
        // Reverse proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) === true) { 
            return (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
        }
        // Reverse proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_PORT']) === true) {
            return ($_SERVER['HTTP_X_FORWARDED_PORT'] === '443');
        }
        elseif (isset($_SERVER['SERVER_PORT']) === true) {
            return ($_SERVER['SERVER_PORT'] === '443');
        }
        return false;
    }
}
