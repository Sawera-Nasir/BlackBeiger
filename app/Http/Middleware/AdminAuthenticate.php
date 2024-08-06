<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AdminAuthenticate extends Middleware
{
    protected function redirect(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('admin.login');
    }

    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('admin')->check()) {
            return $this->auth->shouldUse('admin');
        }
            $this->unauthenicated($request,['admin']);
    }

}          