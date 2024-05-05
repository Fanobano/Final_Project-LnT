<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployController;

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

Route::get('/home', [App\Http\Controllers\BookController::class,'homePage'])->name('homePage');
Route::get('/book', [App\Http\Controllers\BookController::class,'viewPage'])->name('viewPage');
Route::get('/book/add', [App\Http\Controllers\BookController::class,'addPage'])->name('addPage');
Route::post('/book/store', [App\Http\Controllers\BookController::class,'store'])->name('store');
Route::get('/book/edit/{id}', [App\Http\Controllers\BookController::class,'editPage'])->name('editPage');
Route::patch('/book/update/{id}', [App\Http\Controllers\BookController::class,'updateBook'])->name('updateBook');
Route::delete('/book/delete/{id}', [App\Http\Controllers\BookController::class,'deleteBook'])->name('deleteBook');
Route::delete('/book/delete-image/{id}', [App\Http\Controllers\BookController::class,'delete_image'])->name('delete_image');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'category_page'])->name('category_page');
Route::get('/category/add', [App\Http\Controllers\CategoryController::class, 'add_category_page'])->name('add_category_page');
Route::post('/category/add', [App\Http\Controllers\CategoryController::class, 'add_category'])->name('add_category');
Route::delete('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete_category'])->name('delete_category');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


