<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;

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

Route::get('/', [Web\PagesController::class , 'index']);

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
|  LOCALIZATION
|--------------------------------------------------------------------------
*/
// Route::get('set-language/{language}', [LocaleController::class, 'setLocale'])
//     ->name('setlocale');

/*
|--------------------------------------------------------------------------
|  DINING CATEGORY
|--------------------------------------------------------------------------
*/
Route::get('/update-status/{loan}', [Web\LoanController::class , 'csrfReload']);
Route::get('/get-user/{partener}', [Web\PartenerController::class , 'showAjax']);
// tabs add
Route::resource('loans', Web\LoanController::class);
Route::resource('partners',Web\PartenerController::class );
Route::post('partners-search',[Web\PartenerController::class , 'search'] );
Route::post('loans-form/{loan}',[Web\LoanController::class , 'upload'] );
Route::post('update-loans/{loan}',[Web\LoanController::class , 'updatePartial'] );
Route::post('update-status/{loan}',[Web\LoanController::class , 'updateStatusReject'] );
Route::post('assign-partner/{loan}',[Web\LoanController::class , 'assignPatener'] );
Route::post('assign-accounter/{loan}',[Web\LoanController::class , 'updateStatusAssigned'] );
// Route::get('send-loan',[Web\LoanController::class , 'sendXml'] );
// tabs add

Route::post('additional-files/{id}',[ Web\LoanController::class , 'additionalFiles']);
Route::get('additional-files/delete/{id}',[ Web\LoanController::class , 'deleteAdditionalFiles']);


Route::get('loans-form', [Web\LoanController::class , 'showForm']);
Route::post('loans-ajax', [Web\LoanController::class, 'storeAjax'])
    ->name('loans.store-ajax');
Route::patch('loans-ajax/{product_category}', [Web\LoanController::class, 'updateAjax'])
    ->name('loans.update-ajax');
Route::get('export-loans', [Web\LoanController::class, 'export'])
    ->name('loans.export');

Route::resource('countries', Web\CountryController::class);
Route::get('export-countries', [Web\CountryController::class, 'export'])
    ->name('countries.export');
    
Route::resource('cities', Web\CityController::class);
Route::get('export-cities', [Web\CityController::class, 'export'])
    ->name('cities.export');

Route::resource('bank-branchs', Web\BankBranchController::class);
Route::get('export-bank-branchs', [Web\BankBranchController::class, 'export'])
    ->name('bank-branchs.export');


Route::get('bankBranches/{country}',[Web\LoanController::class , 'bankBranches'] );
Route::get('getCities/{country}',[Web\LoanController::class , 'cities'] );
