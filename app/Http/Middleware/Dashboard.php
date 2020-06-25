<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 
use App\User;

class Dashboard
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
        if(Auth::check())
        {
            if(Auth::user()->isAdmin())
            {
                return $next($request);
            }
            
            if(Auth::user()->isFoodBroker())
            {
                return $next($request);
            }
        }
        session()->flash('danger', 'Samo Admin moze da poseti ovu stranu');
        return redirect('/login');
    }
}
