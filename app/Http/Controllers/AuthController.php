<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        return redirect()->route('dashboard.dashboard')->with('success','Account created successfully!');
    }
}
