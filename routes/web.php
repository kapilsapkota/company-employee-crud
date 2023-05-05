<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware'=>['auth']], function() {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('user/profile',[\App\Http\Controllers\Admin\UserController::class, 'profile'])->name('user.profile');
    Route::post('profileUpdate',[\App\Http\Controllers\Admin\UserController::class, 'profileUpdate'])->name('profileUpdate');
    Route::post('passwordUpdate',[\App\Http\Controllers\Admin\UserController::class, 'passwordUpdate'])->name('passwordUpdate');
    Route::resource('role',             \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('permission',       \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('user',             \App\Http\Controllers\Admin\UserController::class);
    Route::resource('company',             \App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('employee',             \App\Http\Controllers\Admin\EmployeeController::class);
});
