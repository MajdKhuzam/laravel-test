<?php

namespace App\Http\Controllers;

use App\Models\Products;
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

    public function login(Request $request)
    {   
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function create_product(Request $request){
        $attributes = $request->validate([
            'product' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ]);

        $imageName = time().'.'.request('image')->extension();
        request()->image->move(public_path('images'), $imageName);

        Products::create([
            'product' => request('product'),
            'price' => request('price'),
            'image' => 'images/' . $imageName,
        ]);

        return response()->json($attributes, 201);
    }

    public function edit_product(Products $product){
        $product = Products::find(request('id'));

        $attributes = $product->update([
            'product' => request('product'),
            'price' => request('price'),
        ]);

        if(request()->has('image')){
            $imageName = time().'.'.request('image')->extension();
            request()->image->move(public_path('images'), $imageName);
            $product->update(['image' => 'images/' . $imageName]);
        }
        return response()->json($attributes, 201);
    }

    public function index(){
        $products = Products::all();
        return response()->json($products);
    }
    
    public function by_name(){
        $products = Products::all()->sortBy('product');
        return response()->json($products);
    }
    
    public function by_price(){
        $products = Products::all()->sortBy('price');
        return response()->json($products);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $results = Products::where('product', 'like', "%$search%")->get();
        return response()->json($results);
    }

}
