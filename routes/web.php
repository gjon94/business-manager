<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessManageController;
use App\Models\Business;
use App\Models\User;
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

Route::prefix('business')->middleware(['auth'])->name('business.')->group(function () {

    //proteggere con verifica legame all'azienda

    
    Route::get('/{businessName}', [BusinessController::class,'index'])->name('index');

    //proteggere con ruolo nellazienda
    ///creazione dipendenti
    Route::get('/{businessName}/create', [BusinessController::class,'create'])->name('create');
    Route::post('/{businessId}/store', [BusinessController::class, 'store'])->name('store');
    Route::delete('/{businessId}/delete/{user}', [BusinessController::class, 'destroy'])->name('delete');

});

require __DIR__.'/auth.php';
