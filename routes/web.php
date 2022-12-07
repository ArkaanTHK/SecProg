<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [ArtikelController::class, 'show3']);

Route::get('/about', function () {
    return view('about');
});


Route::get('/signup', function () {
    return view('signup');
});

Route::get('/addblog', function () {
    return view('addblog');
});


Route::get('/reset', function () {
    return view('reset');
});

Route::get('/showblog', [ArtikelController::class, 'show']);
Route::post('/addblog_process', [ArtikelController::class, 'addblog_process']);
Route::get('/detailblog/{id}', [ArtikelController::class, 'detail']);
Route::get('/adminblog', [ArtikelController::class, 'show_by_admin']);
Route::get('/editblog/{id}', [ArtikelController::class, 'edit']);
Route::post('/editblog_process/{id}', [ArtikelController::class, 'edit_process']);
Route::get('/deleteblog/{id}', [ArtikelController::class, 'delete']);



Route::get('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);
