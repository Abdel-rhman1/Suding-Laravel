<?php

namespace App\Http\Middleware;

use Closure;

class CheckMail 
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
        $mail = $request->mail;
        if(strlen($mail) > 0){
            return "Good Mail";
        }else{
            return "Bad Mail";
        }
        // return $next($request);
    }
}
