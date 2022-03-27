<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/admin/dashboard';
    use AuthenticatesUsers;
    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(AdminLoginRequest $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('unsuccess', 'The given data is invalid.');
    }
    protected function guard()
    {
        return Auth::guard("admin");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/admin/login');
        // ->with('unsuccess', 'Logout Successfully');

    }
}
