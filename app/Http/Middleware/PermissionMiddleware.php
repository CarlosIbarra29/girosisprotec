<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Models\RolPermiso;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $permission)
    {

        $db_permission = Permission::where('name', $permission)->first();
       
        if (Auth::guest()) { return redirect('/login'); }

        if ($db_permission == null) {
           // abort(403);
            return redirect()->route('user.errorpermiso');
        }else{
            $permiso = RolPermiso::where('role_id', Auth::user()->role)->where('permission_id', $db_permission->id)->first();
            if($permiso == null){
                // abort(403);
                return redirect()->route('user.errorpermiso');
            }
        }
        return $next($request);
    }
}
