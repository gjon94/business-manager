<?php

use App\Http\Controllers\AuthEmployee\LoginEmployee;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessManageController;
use App\Http\Controllers\BusinessManageEmployeesController;
use App\Http\Controllers\EmployeeController;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Rotte che ad utente loggato faranno accedere alle proprie aziende ed modificarle

Route::resource('/business-manage', BusinessManageController::class);


// rotta azienda, si accedera solo se admin o dipendete

// Route::middleware(['checkTypeOfUser'])->prefix('business')->name('business.')->group(function () {

//     //proteggere con verifica legame all'azienda


//     Route::get('/{businessId}', [BusinessController::class, 'index'])->name('index');
//     //proteggere con ruolo nellazienda

//     ///manage employees
//     Route::get('/{businessId}/employees/{employeeId}', [BusinessController::class, 'show'])->name('show');
//     Route::get('/{businessId}/create', [BusinessController::class, 'create'])->name('create');
//     Route::post('/{businessId}/store', [BusinessController::class, 'store'])->name('store');
//     Route::delete('/{businessId}/delete/{user}', [BusinessController::class, 'destroy'])->name('delete');
//     Route::get('/{businessId}/edit/{user}', [BusinessController::class, 'edit'])->name('edit');
//     Route::patch('/{businessId}/update/{employeeId}', [BusinessController::class, 'update'])->name('update');
// });



Route::prefix('employee')->name('employee.')->group(function () {

    

    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/login', [LoginEmployee::class, 'create'])->name('show');
    Route::post('/loginPost', [LoginEmployee::class, 'store'])->name('store');
});

require __DIR__ . '/auth.php';


Route::prefix('business/{businessId}')
->name('business.')
->middleware([])
->group(function (){


    //Homepage of interiors business'employees

    Route::get('/homepage',[BusinessController::class, 'index'])->name('homepage');

    // manage employees

    Route::resource('/employees',BusinessManageEmployeesController::class);


    //edit business info

    //TO-DO Route::resource('edit');

});


