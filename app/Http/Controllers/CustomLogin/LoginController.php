<?php

namespace App\Http\Controllers\CustomLogin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function UserIndex()
    {
        Auth::logout();
        return view('backend.login.user');
    }

    public function AdminIndex()
    {
        Auth::guard('admin')->logout();
        return view('backend.login.admin');
    }

    public function CheckUserLogin(Request $request)
    {
        $credentials['username'] = $request->post('username');
        $credentials['password'] = $request->post('password');
        if (Auth::attempt($credentials)) {
            $table_name = 'users';
            $user = db2()->table($table_name)->where(['username' => $credentials['username'], 'password' => $credentials['password']])->get()->first();
            $user = array(
                'id' => $user->id,
                'username' => $user->username,
            );
            session($user); // set session
            return redirect()->intended('wms/dashboard');
        } else {
            return redirect()->back()->with(['error_login' => 'กรุณาตรวจสอบชื่อผู้ใช้ หรือรหัสผ่าน']);
        }
    }

    public function CheckAdminLogin(Request $request)
    {
        $credentials['username'] = $request->post('username');
        $credentials['password'] = $request->post('password');
        if (Auth::guard('admin')->attempt($credentials)) {
            session(['username' => $credentials['username']]); // set session
            return redirect()->intended('itg/domain');
        } else {
            return redirect()->back()->with(['error_login' => 'กรุณาตรวจสอบชื่อผู้ใช้ หรือรหัสผ่าน']);
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()):
            Auth::guard('admin')->logout();
            $route = 'itg.adminlogin';
        else:
            Auth::logout();
            $route = 'wms.login';
        endif;
        return redirect()->route($route);
    }
}
