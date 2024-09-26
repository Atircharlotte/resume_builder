<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavbarController;
use App\Livewire\CreateResume;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\ResumePreview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

// Route::get('/', function () {
//     return view('welcome');
// });

// route for login page
Route::get('/', Login::class);

// route for page after login 
Route::get('/dashboard', Dashboard::class)->name('dashboard');

// route for github login authentication
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);

Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

// route for logout
Route::post('/logout', [NavbarController::class, 'logout'])->name('logout');

// route for create page
Route::get('/create', CreateResume::class);

// route for resume preview
Route::get('/resume/{resumeId}', ResumePreview::class);