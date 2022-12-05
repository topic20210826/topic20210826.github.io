<?php

namespace App\Http\Middleware;

use App\Shop\Entity\User;
use Closure;
use Illuminate\Http\Request;

class AuthUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //預設不允許存取
        $is_allow_access = false;
        //取得會員編號
        $user_id = session()->get('user_id');

        if(!is_null($user_id)){
            $User = User::findOrFail($user_id);
            //session有會員編號，允許存取
            $is_allow_access = true;
        }

        if(!$is_allow_access){
            //若不允許存取，回主頁
            return redirect()->to('/user/auth/sign-in');
        }
        //允許存取，繼續做下個請求
        return $next($request);
    }
}
