<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function store(Request $request)
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
        Admin::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('admin.login')->with('password', '');
    }
}
