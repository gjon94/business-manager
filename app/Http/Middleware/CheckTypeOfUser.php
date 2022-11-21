<?php

namespace App\Http\Middleware;

use App\Models\Business;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTypeOfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {



        //compare if user logged is relationed with business


        $business = $request->route('business');



        if (!isset($business) || !is_numeric($business) || $business == 0) {
            return abort(404);
        }



        $business = Business::findOrFail($business);
        if ($business->user_id === auth()->user()->id || auth()->user()->business_id === $business->id) {

            return $next($request);
        } else {
            return abort(400);
        }
    }
}
