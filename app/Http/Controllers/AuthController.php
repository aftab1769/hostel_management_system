<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'cnic' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->except(['_token', 'submit']))) {
            $usertype = Auth::user()->usertype;
            if ($usertype == '1') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->back()->with(['failure' => "Invalid login details!"]);
        }
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'cnic' => ['required', 'unique:users,cnic'],
            'password' => ['required', 'confirmed']
        ]);

        $data = [
            'name' => $request->name,
            'cnic' => $request->cnic,
            'password' => $request->password,
        ];

        if (User::create($data)) {
            return redirect()->back()->with(['success' => 'Successfully registered']);
        } else {
            return redirect()->back()->with(['failure' => 'Oops, You not registered try again!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
