<?php
use App\Http\Controllers\Trainee\HomeController;
use App\Http\Controllers\Trainee\MessagesController;
use App\Http\Controllers\Trainee\PaymentController;
use App\Http\Controllers\Trainee\TrainsController;
use App\Models\{User,Message};
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
Route::controller(HomeController::class)->middleware('auth')->prefix('trainee')->group(function(){
    Route::get('','home')->name('home');

    Route::controller(TrainsController::class)->prefix('trains')->name('trains.')->group(function(){
        Route::get('all','all')->name('all');
        Route::get('add','add')->name('add');
        Route::post('add','store')->name('store');
    });

    Route::controller(PaymentController::class)->prefix('payments')->name('payments.')->group(function(){
        Route::get('','all')->name('all');
    });

    Route::controller(MessagesController::class)->prefix('messages')->name('messages.')->group(function(){
        Route::get('add','add')->name('add');
        Route::post('add','store')->name('store');
        Route::get('from_coach','from_coach')->name('from_coach');
        Route::get('all','all')->name('all');
    });

});

Route::get('/model-binding/{user}',function(User $user){
    // return User::with('from_messages')->find($user); 
    return view('test',compact('user'));
});