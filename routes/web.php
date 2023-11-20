<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

// Login
Route::get('/login', function (){
    return view('login');
})->name('login');

Route::get('/logout', '\App\Livewire\Login@logout')->name('logout');

// Ruta de posts
Route::get('/posts', function (){
    return view('posts');
})->name('posts');

Route::get('/posts/create', function (){
    return view('create-post');
})->name('create-post')->middleware('auth');

// Ruta de usuarios
Route::get('/user/register', function (){
    return view('register-user');
})->name('register-user');

// Route::auth();

Route::get('/users', function (){
    return view('users');
})->name('users')->middleware('auth');
