<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth']], function () {
    Route::resource('details', 'DetailsController');
    Route::resource('transactions', 'TransactionController');
    Route::get('/deposit', 'TransactionController@deposit')->name('transactions.deposit');
    Route::post('/deposit', 'TransactionController@depositStore')->name('deposit.create');
    Route::get('/deposit/create', function () {
        return view('admin.transactions.create-deposit');
 })->name('deposit.view');
    Route::get('/withdrawal', 'TransactionController@withdrawal')->name('transactions.withdrawal');
    Route::get('/withdrawal/create', function () {
        return view('admin.transactions.create-withdrawal');
    })->name('withdrawal.view');
    Route::post('/withdrawal', 'TransactionController@withdrawStore')->name('withdrawal.create');
});


Route::any('/optimize', function () {
    Artisan::call('route:clear');
    Artisan::call('optimize');
    echo 'Optimized Successfully';
});
Route::any('/migrate', function () {
    Artisan::call('migrate');
    echo 'Migrated Successfully';
});
