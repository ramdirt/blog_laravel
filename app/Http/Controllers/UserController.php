<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {


        return view('user.register.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        session()->flash('success', 'Registration passed
        ');
        Auth::login($user);
        return redirect()->route('home');

        dd($request->all());
    }

    public function loginForm() {
        return view('user.login.create');
    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            
        ])) {
            session()->flash('success', 'You are logged');
            if(Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        };

        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login.create');
    }
}