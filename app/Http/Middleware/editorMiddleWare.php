<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class editorMiddleWare
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
        foreach (Auth::user()->role as $role) {
            if ($role->name=='editor') {
             return $next($request);   
            }
        }
        Session::flash('flash_message', 'Please you are not permitted to view the page you want to access. contact webmaster if this does not apply to you');
        return redirect()->route('admin.restricted');
    }
}
