<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('home', ['products' => $products]);
    }
    public function by_name()
    {
        $products = Products::all()->sortBy('product');
        return view('home', ['products' => $products]);
    }
    public function by_price()
    {
        $products = Products::all()->sortBy('price');
        return view('home', ['products' => $products]);
    }

    public function store()
    {
        request()->validate([
            'product' => ['required', 'min:3'],
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

        return redirect('/');
    }

    public function edit(Products $product)
    {
        return view('product_edit', ['product' => $product]);
    }

    public function update(Products $product)
    {
        $product = Products::find($product->id);

        $product->update([
            'product' => request('product'),
            'price' => request('price'),
        ]);

        if(request()->has('image')){
            $imageName = time().'.'.request('image')->extension();
            request()->image->move(public_path('images'), $imageName);
            $product->update(['image' => 'images/' . $imageName]);
        }

        return redirect('/');
    }

    public function destroy(Products $product)
    {
        $product = Products::find($product->id);
        $product->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Products::where('product', 'like', "%$search%")->get();

        return view('home', ['products' => $results]);
    }

}
