<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/products", [ProductController::class, "index"])->name("products.index");
Route::get("/product/create", [ProductController::class, "create"])->name("product.create");
Route::post("/products", [ProductController::class, "store"])->name("product.store");
Route::get("/product/{product}/edit", [ProductController::class, "edit"])->name("product.edit");
Route::put("/product/{product}/update", [ProductController::class, "update"])->name("product.update");
Route::delete("/product/{product}/delete", [ProductController::class, "delete"])->name("product.delete");