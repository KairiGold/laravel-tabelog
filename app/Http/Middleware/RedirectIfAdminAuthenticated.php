<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdminAuthenticated
{
    /**
     * ログイン済みの管理者が管理者ログイン画面にアクセスした場合、管理画面トップへリダイレクトする。
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            return redirect(route('admin.home'));
        }

        return $next($request);
    }
}
