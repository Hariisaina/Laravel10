<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthProfesseur;


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
Route::get('/login',[AuthController::class, 'login']);
Route::get('/registration',[AuthController::class, 'registration']);
Route::post('/register-user',[AuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[AuthController::class,'loginUser']) -> name('login-user');
Route::post('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
Route::get('/login_professeur',[AuthProfesseur::class, 'login_professeur']);
Route::post('/loginEns',[AuthProfesseur::class,'loginEns']) -> name('loginEns');







