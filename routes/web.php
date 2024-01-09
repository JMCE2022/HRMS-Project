<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;


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
Route::get('/', [LoginDashboardController::class, 'login']);
Route::post('login', [LoginDashboardController::class, 'AuthLogin']);

Route::group(['middleware' => 'superadmin'], function () {
    Route::get('/SuperAdmin/Dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/SuperAdmin/Employee', [EmployeeController::class, 'employee']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/Admin/Dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/Admin/Employee', [EmployeeController::class, 'employee']);
});

Route::group(['middleware' => 'employee'], function () {
    Route::get('/Employee/Dashboard', [DashboardController::class, 'dashboard']);
});

Route::get('/logout', [LoginDashboardController::class, 'logoutButton'])->name('logoutButton');