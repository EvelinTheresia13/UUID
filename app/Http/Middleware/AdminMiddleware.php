<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware{
    /**
     * Hand;e an incoming request
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */

     public function handle($request, Closure $next){
        $users = auth()->users(); 
        
        if ($users->isAdmin()){
            return $next($request);
        }

        return response()->json([
            'message' => 'Anda Bukan Admin',
        ]);
    }
}
?>