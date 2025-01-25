<?php

use App\Http\Controllers\AnythingController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\QRcodeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Route;



// Route::get('/about', function(){
//     return view('about');
// });


Route::get('/anything', [AnythingController::class, 'index']);


Route::get('/about', [QRcodeController::class, 'generate']);

// Route::get('/create_product', function(){
//     return view('create_product');
// });

Route::get('/', [ProductsController::class, 'index']);
Route::get('/byName', [ProductsController::class, 'by_name']);
Route::get('/byPrice', [ProductsController::class, 'by_price']);
Route::get('/search', [ProductsController::class, 'search']);

Route::get('/create_product', [ProductsController::class, 'create']);
Route::post('/create_product', [ProductsController::class, 'store']);
Route::get('/products/{product}/edit', [ProductsController::class, 'edit']);
Route::patch('/products/{product}/edit', [ProductsController::class, 'update']);
Route::delete('/products/{product}/edit', [ProductsController::class, 'destroy']);

Route::get('/profile', [RegisteredUserController::class, 'profile']);
Route::patch('/profile', [RegisteredUserController::class, 'update']);

Route::get('/change_password', [RegisteredUserController::class, 'change_password']);
Route::patch('/change_password', [RegisteredUserController::class, 'update_password']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::get('/products-pdf', [PdfController::class, 'generatePDF']);

Route::get('/qrcode', [QRcodeController::class, 'generate']);
