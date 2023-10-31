<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

//------------------------------------------------------Login and Register Area------------------------------------------------------//
//Login Page
Route::get('/loginpage', [UserController::class, 'loginpage'])->name('loginpage');
//Login Function
Route::post('/loginaccount', [UserController::class, 'userlogin'])->name('userlogin');

//Register Page
Route::get('/registerpage', [UserController::class, 'registerpage']);
//Register Function
Route::post('/registeraccount', [UserController::class, 'userregister'])->name('userregister');

//Display User Dashboard Page
Route::get('/users/dashboard/{id}',[UserController::class,'userdashboard']);

//Logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Home Page
Route::get('/', [UserController::class, 'home']);

//------------------------------------------------------Admin Control Area------------------------------------------------------//
//Display Admin Login Page
Route::get('/admin/login', [AdminController::class, 'login'])->middleware('alreadyLoggedIn');

//Login Admin Function
Route::post('/admin/login', [AdminController::class, 'loginAdmin'])->name('login-user');

// Set the middleware in admin panel
Route::middleware(['alreadyLoggedIn', 'isLoggedIn'])->group(function () {
    // Display Admin Dashboard Page
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

    // Category Page
    Route::get('/admin/Category', [CategoryController::class,'index']);

    // Create Category Page
    Route::get('/admin/Category/create', [CategoryController::class, 'createCategory']);

    // Store Category
    Route::get('/admin/Category/store', [CategoryController::class, 'storeCategory'])->name('storeCategory');

});

//Logout Admin Function
Route::get('/admin/logout', [AdminController::class, 'logout'])->middleware('isLoggedIn');

//Admin Change Status Function
Route::get('/change-status/{id}', [AdminController::class, 'changeStatus']);

//------------------------------------------------------Frontend Control Area------------------------------------------------------//
// About Page
Route::get('/about', [UserController::class, 'about'])->name('about');

//------------------------------------------------------Frontend Service Area------------------------------------------------------//
// Service Page
Route::get('/service', [UserController::class, 'service'])->name('service');

//------------------------------------------------------Frontend Food Control Area-------------------------------------------------//
// Menu Page
Route::get('/food', [UserController::class, 'food'])->name('food');
// Menu Page Food Detail
Route::get('/food-detail', [UserController::class, 'FoodDetail'])->name('food-detail');
