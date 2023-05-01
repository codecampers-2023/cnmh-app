<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class ModelExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        //Get url
        $url = $_SERVER['REQUEST_URI'];
        // Detected the last '/' character in url
        $lastSlashPos = strrpos($url, "/");
        $param = substr($url, $lastSlashPos + 1); // Extracts the parameter after the last '/' character
        $model= 'App\\Models\\'.ucfirst($param);

            if(is_subclass_of($model, 'App\\Models\\Consultation')){

                return $next($request);

        } else {
            abort(404);
        }



    }
}
