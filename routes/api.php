<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Authentication
Route::post('/register', [UserController::class,"register"]);
Route::post('/login', [UserController::class,"login"]);

//Products
Route::get('/products', [ProductController::class,'list']);
Route::post('/add-products', [ProductController::class,"addProduct"]);
Route::delete('/delete-products/{id}', [ProductController::class,"delete"]);
Route::get('/get-product/{id}', [ProductController::class,'getProduct']);
Route::put('/update-products/{id}', [ProductController::class,'updateProduct']);
Route::get('search/{key}',[ProductController::class,'search']);
