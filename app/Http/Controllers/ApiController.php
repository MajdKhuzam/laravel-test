<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ApiController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed'],
            'type' => Rule::in(['admin','guest']),
        ]);
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Validation fails',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => Hash::make($request->password),
            'type' => request('type'),
        ]);

        return response()->json([
            'message' => 'Registeration successfull',
            'data' => $user
        ], 200);
    
    }

    // public function login(Request $request){
    //     $validator = request()->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);


    //     if(!Auth::attempt($validator)){
    //         return response()->json([
    //             'message' => 'Login fails'
    //         ], 422);
    //     }

    //     request()->session()->regenerate();

    //     return response()->json([
    //         'message' => 'Login successfull',
    //         'data' => $validator
    //     ], 200);

    // }
    
}
