<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
Route::get('/',[PageController::class,'home'])->name('Page.home');
Route::get('/register',[PageController::class,'register'])->name('Page.register');
Route::post('/register',[PageController::class,'createSubmit'])->name('Page.submit');
Route::get('/login',[PageController::class,'login'])->name('Page.login');
Route::post('/login',[PageController::class,'loginSubmit'])->name('Page.loginSubmit');
Route::get('/user/details/{id}',[PageController::class,'details'])->name('User.details');
Route::get('/user/dashboard/',[PageController::class,'dashboard'])->name('User.dashboard');
