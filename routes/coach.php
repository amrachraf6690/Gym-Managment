<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Coach\{CoachController,UserController,TrainController,PaymentsController,MessagesController};
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

//Login Routes
Route::controller(AuthController::class)->middleware('guest')->group(function(){
    Route::get('','login')->name('login');
    Route::post('','auth')->name('auth');
});


//Coach Routes
Route::controller(CoachController::class)->middleware('auth')->prefix('coach')->group(function(){
    Route::get('','home')->name('home');
    Route::post('','logout')->name('logout');

    //Coach User Controlling
    Route::controller(UserController::class)->name('users.')->prefix('users')->group(function(){
        Route::get('add','add')->name('add');
        Route::post('add','store')->name('store');
        Route::get('','users')->name('all');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });

    
    //Coach Payments Controlling
    Route::controller(PaymentsController::class)->name('payments.')->prefix('payments')->group(function(){
        Route::get('add','add')->name('add');
        Route::post('add','store')->name('store');
        Route::get('all','all')->name('all');
    });

    //Coach Trains Controlling
    Route::controller(TrainController::class)->name('trains.')->prefix('trains')->group(function(){
        Route::get('unconfirmed','unconfirmed')->name('unconfirmed');
        Route::get('','all')->name('all');
        Route::get('confirm/{id}','confirm')->name('confirm');
        Route::get('delete/{id}','delete')->name('delete');
        Route::get('users/{id}','user')->name('user');
    });

    
    //Coach Messaging Controlling
    Route::controller(MessagesController::class)->name('messages.')->prefix('messages')->group(function(){
        Route::get('add','add')->name('add');
        Route::post('add','store')->name('store');
        Route::get('from_users','from_users')->name('from_users');
        Route::get('all','all')->name('all');
    });

});


