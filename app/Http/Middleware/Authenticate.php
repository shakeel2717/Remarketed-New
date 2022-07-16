<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }

        if ($request->user()->role == 'admin') {
            return route('admin.dashboard.index');
        } elseif ($request->user()->role == 'user') {
            return route('user.dashboard.index');
        } elseif ($request->user()->role == 'customer') {
            return route('customer.dashboard.index');
        } else {
            return route('register');
        }
    }
}
