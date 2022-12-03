<?php

use App\Http\Controllers\AuthEmployee\LoginEmployee;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessManageController;
use App\Http\Controllers\BusinessManageEmployeesController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\CustomTableControler;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
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
})->middleware(['auth', 'IsOwner'])->name('dashboard');

// Rotte che ad utente loggato faranno accedere alle proprie aziende ed modificarle

Route::resource('/business-manage', BusinessManageController::class)->middleware('IsOwner');



Route::prefix('businesses/{business}')->name('business.')->middleware(['auth', 'checkTypeOfUser'])->group(function () {

    //Homepage of interiors business'employees

    Route::get('/homepage', [BusinessController::class, 'homepage'])->name('homepage');


    //INTERNAL POSTS
    Route::resource('/posts', PostController::class);


    // manage employees
    Route::resource('/employees', BusinessManageEmployeesController::class);



    Route::prefix('pages')->name('page.')->group(function () {

        Route::resource('/customPage', CustomPageController::class);

        Route::resource('/{customPage}/tables', CustomTableControler::class);
    });
});





Route::prefix('employee')->name('employee.')->group(function () {

    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/login', [LoginEmployee::class, 'create'])->name('login');
    Route::post('/loginPost', [LoginEmployee::class, 'store'])->name('store');
});




require __DIR__ . '/auth.php';
