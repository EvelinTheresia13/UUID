<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmailVerifiedMiddleware
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
        $users = auth()->users();

        if($users->email_verified_at !=null){
            return $next($request);
        }

        return response()->json([
            'message' => 'Email Anda Belum Terverifikasi',
        ]);
    }
}
