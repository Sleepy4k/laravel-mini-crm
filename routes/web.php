<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompaniesController;
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

Route::get('/index', function(){
    return view ('dashboard.dashboard ');
});

Route::get('/', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/signout', [UserController::class, 'signout'])->name('signout');

// Companies route
//Route::resource('companies', CompaniesController::class);

Route::get('companies', [CompaniesController::class, 'index']);
Route::get('companies/create', [CompaniesController::class, 'create'])->name('companies.create');
Route::post('companies', [CompaniesController::class, 'store'])->name('companies.store');
Route::get('/companies/{id}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::post('/update/{id}', [CompaniesController::class, 'update'])->name('companies.update');
Route::delete('/destroy/{id}', [CompaniesController::class, 'destroy'])->name('destroy');