<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CompanyController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    Route::resource('companies', CompanyController::class);
    
    Route::resource('employees', EmployeeController::class);
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::delete('companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');

    Route::get('companies/{id}/edit', 'CompanyController@edit')->name('companies.edit');
});

require __DIR__.'/auth.php';
