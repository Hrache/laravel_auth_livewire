<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\TailwindDemo;

Route::get('/', Home::class)->name('home.index');
Route::get('/tailwind', TailwindDemo::class)->name('tailwind.demo');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::post('/signin', [Login::class, 'signin'])->name('signin');
Route::post('/register', [Register::class, 'signup'])->name('signup');

Route::post('/logout', [Login::class, 'signout'])->name('signout');
