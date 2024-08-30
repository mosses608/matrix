<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\PostTooLargeException;

class CheckPostSize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Illuminate\Http\Exceptions\PostTooLargeException
     */
    public function handle($request, Closure $next)
    {
        $maxSize = 102400; 
        
        if ($request->server('CONTENT_LENGTH') > $maxSize * 1024) {
            throw new PostTooLargeException;
        }

        return $next($request);
    }
}

