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
        $attributes = request()->validate([
            'product' => ['required'],
            'price' => ['required'],
        ]);

        Products::create($attributes);

        return redirect('/');
    }

    public function edit(Products $product)
    {
        return view('product_edit', ['product' => $product]);
    }

    public function update(Products $product)
    {
        $attributes = request()->validate([
            'product' => ['required'],
            'price' => ['required'],
        ]);
        $product = Products::find($product->id);

        $product->update([
            'product' => request('product'),
            'price' => request('price'),
        ]);

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
