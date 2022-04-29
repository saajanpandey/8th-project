<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployerLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class EmployerLoginController extends Controller
{
    protected $redirectTo = '/employer/dashboard';
    use AuthenticatesUsers;
    public function showEmployerLoginForm()
    {
        return view('employer.auth.login');
    }

    public function employerLogin(EmployerLoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1'], $remember_me,)) {
            return redirect()->route('employer.dash');
        }
        return redirect()->route('employer.view')->withInput($request->only('email', 'remember_me'))->with('unsuccess', 'The given data is invalid.');
    }
    protected function guard()
    {
        return Auth::guard("employer");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('employer.view');
        // ->with('unsuccess', 'Logout Successfully');

    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('employer.dashBoard');
        }
        return redirect()->route('employer.view')->with('unsuccess', 'The given data is invalid.');
    }
}
