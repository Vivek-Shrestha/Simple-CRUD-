<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[Controllers\StudentsController::class,'index'])->name('index');
Route::post('/',[Controllers\StudentsController::class,'store']);
Route::get('/delete/{id?}',[Controllers\StudentsController::class,'delete'])->name('delete');
Route::get('/edit/{id?}',[Controllers\StudentsController::class,'edit'])->name('edit');
Route::any('/edit-action',[Controllers\StudentsController::class,'update'])->name('edit-action');