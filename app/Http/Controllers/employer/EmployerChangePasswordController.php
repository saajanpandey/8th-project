<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rules\Password;
use Auth;
use Illuminate\Support\Facades\Hash;

class EmployerChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => [
                'required', Password::min(6)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],

            'new_confirm_password' => ['same:new_password'],

        ]);
        Employer::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('employer.view')->with('password', '');
    }
}
