<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/create-product', [ApiController::class, 'create_product']);
Route::post('/edit-product', [ApiController::class, 'edit_product']);

Route::get('/', [ApiController::class, 'index']);
Route::get('/byName', [ApiController::class, 'by_name']);
Route::get('/byPrice', [ApiController::class, 'by_price']);
Route::get('/search', [ApiController::class, 'search']);

Route::delete('/delete-product', [ApiController::class, 'destroy']);