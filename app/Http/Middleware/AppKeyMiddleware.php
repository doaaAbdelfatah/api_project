<?php

namespace App\Http\Middleware;

use Closure;

class AppKeyMiddleware
{    
    public function handle($request, Closure $next)
    {
        $key = $request->header("API_App_KEY");

        if ($key == env("MY_API_KEY"))
        {
            return $next($request);
        }else {
            return  response()->json(["message" =>"Invalid Application Key"] ,401);
        }

        
    }
}
