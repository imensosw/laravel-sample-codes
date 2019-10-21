<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfRole
{
    public function handle($request, Closure $next)
    {
        if ( Auth::user() && ! session()->has('role') )
        {
            if( sizeof( Auth::user()->roles) == 0 )
            {
                return redirect('norole');
            }
            else if( sizeof( Auth::user()->roles) == 1  )
            {
                session(['role' => Auth::user()->roles[0]['id']]);
            }
            else 
            {
                return redirect('selectLoginRole');
            }
        }
        return $next($request);
    }
}
