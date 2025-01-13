<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        // validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed'],
            'type' => Rule::in(['admin','guest']),
        ]);
        
        // store
        $user = User::create($attributes);
        
        // login
        Auth::login($user);

        // redirect
        return redirect('/');
    }

    public function profile(){
        // return request('type');
        return view('profile', ['user' => Auth::user()]);
    }
    
    public function update(){
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'type' => Rule::in(['admin','guest']),
        ]);

        $user = User::find(Auth::user()->id);
        $user->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'type' => request('type'),
        ]);

        return redirect('/profile');
    }

    public function change_password(){
        return view('change_password');
    }

    public function update_password(){
        $attributes = request()->validate([
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->update(['password' => request('password')]);

        return redirect('/profile');
    }

}
