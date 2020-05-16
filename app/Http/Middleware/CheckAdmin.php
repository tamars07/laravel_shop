<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->auth->check()){
            //throw new Exception("Bạn chưa đăng nhập");
            return redirect()->guest('/dang-nhap');
        }

        $user = $this->auth->user();
        if(!$user->is_admin){
            //throw new Exception("Bạn chưa đăng nhập vào quyền quản trị", 1);
            return redirect()->guest('/');

        }
        return $next($request);
    }
}
