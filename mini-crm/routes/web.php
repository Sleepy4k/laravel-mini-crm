<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LogintestController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/index', function(){
    return view ('dashboard.dashboard ');
});

Route::get('/', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/signout', [UserController::class, 'signout'])->name('signout');

// Companies Routes
Route::get('/companies', [CompaniesController::class, 'index'])->name('index')->middleware('auth');
Route::get('/companies_add', [CompaniesController::class, 'add'])->name('add')->middleware('auth');
Route::post('/companies_add', [CompaniesController::class, 'save'])->name('save')->middleware('auth');
Route::get('/getcompanies/{id}', [CompaniesController::class, 'getdata'])->name('getdata')->middleware('auth');
Route::post('/updatecompanies/{id}', [CompaniesController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/deletecompanies/{id}', [CompaniesController::class, 'delete'])->name('delete')->middleware('auth');

// Employees Routes
Route::get('/employees', [EmployeesController::class, 'index'])->name('index')->middleware('auth');
Route::get('/employees_add', [EmployeesController::class, 'add'])->name('add')->middleware('auth');
Route::post('/employees_add', [EmployeesController::class, 'save'])->name('save')->middleware('auth');
Route::get('/getemployees/{id}', [EmployeesController::class, 'getdata'])->name('getdata')->middleware('auth');
Route::post('/updateemployees/{id}', [EmployeesController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/deleteemployees/{id}', [EmployeesController::class, 'delete'])->name('delete')->middleware('auth');