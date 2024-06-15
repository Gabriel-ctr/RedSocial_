<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

// Página de inicio (para usuarios sin registro)
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas para las páginas de perfil y timeline
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::get('/password/reset', function () {
    return 'Página de recuperación de contraseña (aún no implementada)';
})->name('password.request');
