<?php

use App\Http\Controllers\AuthEmployee\LoginEmployee;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessManageController;
use App\Http\Controllers\BusinessManageEmployeesController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\CustomTableControler;
use App\Http\Controllers\EmployeeController;
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


Route::get('/prova', function () {

    return view('prova');
});

Route::get('/ddd', function () {

    $customPagesDeadlines = DB::select(DB::raw('select businesses.id as businessId, custom_pages.id as customPageId,custom_pages.name as customPageName ,
        custom_tables.column_2 as end_time,custom_tables.column_3,column_names.name_column_3 from businesses
        
        inner join custom_pages on custom_pages.business_id = businesses.id
        inner join custom_tables on custom_tables.custom_page_id = custom_pages.id
        inner join column_names on column_names.custom_page_id = custom_pages.id
        
        
        where businesses.id = 1 and custom_tables.column_2 is not null
         
        
        order by custom_tables.column_2 '));


    $employeeDeadlines = DB::select(DB::raw('select employees.id as userId,name ,surname,deadlines.end_time from employees
        inner join contracts on contracts.id = employees.contract_id
        inner join deadlines on deadlines.id = contracts.deadline_id
        
        order by deadlines.end_time'));

    return [$customPagesDeadlines, $employeeDeadlines];
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Rotte che ad utente loggato faranno accedere alle proprie aziende ed modificarle

Route::resource('/business-manage', BusinessManageController::class);



Route::prefix('business/{businessId}')->name('business.')->middleware(['auth', 'checkTypeOfUser'])->group(function () {

    //Homepage of interiors business'employees

    Route::get('/homepage', [BusinessController::class, 'index'])->name('homepage');

    // manage employees
    Route::resource('/employees', BusinessManageEmployeesController::class);



    Route::prefix('pages')->name('page.')->group(function () {

        Route::resource('/custom-page', CustomPageController::class);

        Route::resource('/{customPageId}/tables', CustomTableControler::class);
    });
});





Route::prefix('employee')->name('employee.')->group(function () {

    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/login', [LoginEmployee::class, 'create'])->name('login');
    Route::post('/loginPost', [LoginEmployee::class, 'store'])->name('store');
});

require __DIR__ . '/auth.php';
