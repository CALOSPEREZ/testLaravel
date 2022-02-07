<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class PermissionVMiddleware extends PermissionMiddleware
{
    public function handle($request, Closure $next, $permission, $guard = null)
    {
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);
  
        foreach ($permissions as $permission) {
            if ($authGuard->user()->hasAnyPermission($permission)) {
             
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
