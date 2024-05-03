<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function store(){
        //validate user data
        //create user
        //login
        //redirect them back

        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);
        $user = User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=> Hash::make($validated['password']),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard.dashboard')->with('success','Account created successfully!');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt($validated)){

            request()->session()->regenerate();

            return redirect()->route('dashboard.dashboard')->with('success','Logged in successfully!');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with the provided email and password.',
            // 'password' => 'Incorrect Password'
        ]);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard.dashboard')->with('success','Logged out successfully!');
    }
}
