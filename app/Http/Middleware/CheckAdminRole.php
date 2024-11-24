<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Kiểm tra nếu user chưa đăng nhập hoặc role_id không phải 1
        if (!$user || $user->role_id != 1) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập vào trang này.');
        }

        return $next($request);
    }
}

