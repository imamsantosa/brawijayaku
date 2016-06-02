<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/16/16
 * Time: 22:35
 */

namespace App\Http\Middleware;
use Closure;

class Status
{
    public function handle($request, Closure $next)
    {
        $admin = $this->isAdmin($request->route());
        $is_Admin = auth()->user()->is_admin;

        if ($admin)
        {
            if(!$is_Admin){
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['error' => true, 'message'=>'you not admin']);
                } else {
                    return redirect()->route('user-home');
                }
            }
        }

        return $next($request);
    }

    function isAdmin($route) {
        $action = $route->getAction();
        return isset($action['admin'])? $action['admin'] : false ;
    }
}