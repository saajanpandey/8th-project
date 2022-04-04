<?php

namespace App\Http\Controllers\employeer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployerLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class EmployerLoginController extends Controller
{
    protected $redirectTo = '/employer/dashboard';
    use AuthenticatesUsers;
    public function showEmployerLoginForm()
    {
        return view('employeer.auth.login');
    }

    public function employerLogin(EmployerLoginRequest $request)
    {
        if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/employer/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('unsuccess', 'The given data is invalid.');
    }
    protected function guard()
    {
        return Auth::guard("employer");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/employer/login');
        // ->with('unsuccess', 'Logout Successfully');

    }
}
