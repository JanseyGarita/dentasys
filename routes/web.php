<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::get('/roles', function () {
    return view('roles');
})->name('roles');


Route::resource('/usuarios',UsuarioController::class);  


Auth::routes(['verify' => true]);

Route::get('/app', [HomeController::class, 'index'])->name('dashboard');


Route::post('/make/register',[RegisterController::class,'makeRegister'])->name('make.register');

Route::get('/profile',[ProfileController::class,'showProfile'])->name('show.profile');

Route::get('/updateProfile',[ProfileController::class,'updateProfile'])->name('update.profile');



// Route::get('/verify', function () {
//   return view('auth.verify');
// })->name('verify');