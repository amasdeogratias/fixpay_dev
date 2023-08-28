<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Site\{
    CategoryController,
    ProductController
};


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
require 'admin.php';

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'site.pages.homepage');


Auth::routes();
Route::get('/email/verify', function(){
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/product/{slug}',  [ProductController::class, 'show'])->name('product.show');
Route::post('/product/add/cart', [ProductController::class, 'addToCart'])->name('product.add.cart');


