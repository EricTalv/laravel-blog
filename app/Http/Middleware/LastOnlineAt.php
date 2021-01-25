<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LastOnlineAt
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
        // When we get a guest we just skip
        if (auth()->guest()) {
            return $next($request);
        }

        /**
         *  When we get a user check 'last-online-at' field in DB
         *  check if user is more than an hour old
         *  If its more than an hour, update DB time to current time
         */
        if (auth()->user()->last_online_at->diffInHours(now()) !==0)
        {
            DB::table("users")
                ->where("id", auth()->user()->id)
                ->update(["last_online_at" => now()]);
        }

        return $next($request);
    }
}
