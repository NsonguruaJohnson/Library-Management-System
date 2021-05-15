<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminDashboardController;

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
    return view('home');
})->name('home');

// Route::get('/', []);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/add-user', [AdminDashboardController::class, 'adduser'])->name('admin.adduser');
Route::post('/admin/add-user', [AdminDashboardController::class, 'storeuser']);

Route::get('/admin/add-book', [AdminDashboardController::class, 'addbook'])->name('admin.addbook');
Route::post('/admin/add-book', [AdminDashboardController::class, 'storebook']);

Route::get('/admin/edit-book/{id}', [AdminDashboardController::class, 'editbook'])->name('admin.editbook');
Route::post('/admin/update-book/{id}', [AdminDashboardController::class, 'updatebook'])->name('admin.updatebook');
Route::post('/admin/delete-book/{id}', [AdminDashboardController::class, 'deletebook'])->name('admin.deletebook');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


// Route::get('/admin-login', [AdminDashboardController::class, 'index'])->name('admin.login');
