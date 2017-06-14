<?php
namespace App\Http\Middleware;

use Closure;

class Authenticate
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request            
     * @param \Closure $next            
     * @param string|null $guard            
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (\Auth::guard($guard)->guest()) {
            
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                if ($guard === 'admin')
                    return redirect()->route('admin.auth.login');
                elseif ($guard === 'user')
                    return redirect()->route('auth.login');
            }
        }
        return $next($request);
    }

    /**
     * リクエスト毎ステータスチェック
     * 条件追加時はここで
     *
     * @param unknown $guard            
     * @return bool
     */
    public function checkStatus($guard)
    {
        if (auth()->guard($guard)->user()->status !== true) {
            auth()->guard($guard)->logout();
            \Flash::error('ステータスが無効です。');
            return false;
        }
        return true;
    }
}
