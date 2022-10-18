<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;

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


Route::get('/', [UserController::class, 'login'])->name('login');//->middleware('guest');
Route::post('/', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/signout', [UserController::class, 'signout'])->name('signout');

// Employees Routes
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');//->middleware('auth');
Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');//->middleware('auth');
Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');//->middleware('auth');
Route::get('/employees/{id}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');//->middleware('auth');
Route::post('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');//->middleware('auth');
Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');//->middleware('auth');

