<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/', [UserController::class, 'authenticate'])->name('authenticate');

// Companies Routes
Route::get('/companies', [CompaniesController::class, 'index'])->name('index');
Route::get('/companies_add', [CompaniesController::class, 'add'])->name('add');
Route::post('/companies_add', [CompaniesController::class, 'save'])->name('save');
Route::get('/getcompanies/{id}', [CompaniesController::class, 'getdata'])->name('getdata');
Route::post('/updatecompanies/{id}', [CompaniesController::class, 'edit'])->name('edit');
Route::get('/deletecompanies/{id}', [CompaniesController::class, 'delete'])->name('delete');

// Employees Routes
Route::get('/employees', [EmployeesController::class, 'index'])->name('index');
Route::get('/employees_add', [EmployeesController::class, 'add'])->name('add');
Route::post('/employees_add', [EmployeesController::class, 'save'])->name('save');
Route::get('/getemployees/{id}', [EmployeesController::class, 'getdata'])->name('getdata');
Route::post('/updateemployees/{id}', [EmployeesController::class, 'edit'])->name('edit');
Route::get('/deleteemployees/{id}', [EmployeesController::class, 'delete'])->name('delete');