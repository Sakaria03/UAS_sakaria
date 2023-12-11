<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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


// pages
Route::get("/", [HomeController::class,"index"]);
Route::get("/about", [HomeController::class,"about"]);
Route::get("/contact", [HomeController::class,"contact"]);
Route::get("/alumni", [HomeController::class,"alumni"]);
Route::get("/profil", [HomeController::class,"profil"]);
Route::get("/services", [HomeController::class,"services"]);
Route::get("/mahasiswa", [HomeController::class,"mahasiswa"]);

//auth
Route::get("/login", [AuthController::class,"login"])->name("login");
Route::get("register", [AuthController::class,"register"])->name("register");

// create user route
Route::post("/register", [AuthController::class,"create_user"])->name("create-user");

Route::post("/login", [AuthController::class,"authenticated"]);
Route::get("/logout", [AuthController::class,"logout"]);

//dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

// slider
Route::resource('sliders',SliderController::class)->middleware(['auth', 'verified']);

// 
Route::get('/email/verify/{id}/{remember_token}', [AuthController::class, 'verification'])->name('verification.verify');

// Route Tampilan Users
Route::resource('user', UserController::class)->middleware(['auth', 'verified']);

// Route Tampilan Category
Route::resource('category', CategoryController::class)->middleware(['auth', 'verified']);