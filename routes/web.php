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

Route::get('/home', [App\Http\Controllers\EmployController::class,'homePage'])->name('homePage');
Route::get('/employee', [App\Http\Controllers\EmployController::class,'viewPage'])->name('viewPage');
Route::get('/employee/add', [App\Http\Controllers\EmployController::class,'addPage'])->name('addPage');
Route::post('/employee/store', [App\Http\Controllers\EmployController::class,'store'])->name('store');
Route::get('/employee/edit/{id}', [App\Http\Controllers\EmployController::class,'editPage'])->name('editPage');
Route::patch('/employee/update/{id}', [App\Http\Controllers\EmployController::class,'updateEmployee'])->name('updateEmployee');
Route::delete('/employee/delete/{id}', [App\Http\Controllers\EmployController::class,'deleteEmployee'])->name('deleteEmployee');