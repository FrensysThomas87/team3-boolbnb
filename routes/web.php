<?php

// use App\Http\Controllers\ApartmentController;

// use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicApartmentController;

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

Route::get('/', 'PublicApartmentController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/apartments', 'PublicApartmentController@index')->name('public.apartments.index');

Route::get('/apartments/{apartment}', 'PublicApartmentController@show')->name('public.apartments.show');


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){
        Route::resource('apartments', ApartmentController::class);
    });

    // Route::prefix('dashboard')
    // ->namespace('Admin')
    // ->middleware('auth')
    // ->group(function(){
    //     Route::get('apartments', 'DashBoardController@edit')->name('dashboard-edit');
    // });

    Route::prefix('dashboard')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){
        Route::get('apartments', 'DashBoardController@index')->name('dashboard');
    });

    Route::post('/message', 'MessagesController@store' )->name('message');






Route::get('/search', 'SearchController@index')->name('search');

Route::get('/payment', 'PaymentsController@index')->name('payment');
Route::post('/payment/process', 'PaymentsController@process')->name('payment.process');


